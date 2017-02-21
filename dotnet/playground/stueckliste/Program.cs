using System;
using System.Collections.Generic;
using System.Globalization;
using System.IO;
using System.Linq;

// Siehe Musterloesungen HE_11 Fragen_Prüfung3

namespace Engineering.Core {
    public class Device 
    {
        public double Weight { get; set; }
        public double Price { get; set; }

        public Device(double weight, double price)
        {
            this.Weight = weight;
            this.Price = price;
        }

        public override string ToString()
        {
            return string.Format(
                "Weight: {0,6:###.#} kg  Price: {1,6:###.##} CHF", Weight, Price);
        }

    }

    public class BillOfMaterial
    {
        private List<Device> devices;

        public BillOfMaterial(List<Device> devices = null)
        {
            if (devices == null) {
                this.devices = new List<Device>();
            } else {
                this.devices = devices;
            }
        }

        public void Add(Device device)
        {
            devices.Add(device);
        }

        public List<Device> GetDevices()
        {
            return devices;
        }

        public override string ToString()
        {
            string str = "";
            foreach (Device d in devices) {
                str += d + "\n";
            }
            return str;            
        }

        public BillOfMaterial FindDevicesLinq(double minWeight, double maxWeight)
        {
            var result = from d in devices
                          where d.Weight > minWeight && d.Weight < maxWeight
                          orderby d.Weight
                          select d;
            List<Device> list = result.ToList<Device>();
            BillOfMaterial bom = new BillOfMaterial(list);
            return bom;
        }
        public BillOfMaterial FindDevicesDelegate(double minWeight, double maxWeight)
        {
            var result = devices.FindAll(delegate (Device d) {
                return d.Weight > minWeight && d.Weight < maxWeight;
            });
            List<Device> list = result.ToList<Device>();
            BillOfMaterial bom = new BillOfMaterial(list);
            return bom;            
        }

        public BillOfMaterial FindDevicesLambda(double minWeight, double maxWeight)
        {
            var result = devices.FindAll(
                d => d.Weight > minWeight && d.Weight < maxWeight
            );
            List<Device> list = result.ToList<Device>();
            BillOfMaterial bom = new BillOfMaterial(list);
            return bom;            
        }
    }
}

namespace Engineering
{
    using Engineering.Core;

    public class Program
    {
        public static BillOfMaterial readCSV(string filepath)
        {
            BillOfMaterial bom = new BillOfMaterial();
            using (StreamReader reader = new StreamReader(new FileStream(filepath, FileMode.Open)))                        
            {
                while(!reader.EndOfStream)
                {
                    string line = reader.ReadLine();
                    string [] recs = line.Split(';');
                    if (recs.Length == 2) {
                        double weight = double.Parse(recs[0], CultureInfo.InvariantCulture);
                        double price = double.Parse(recs[1], CultureInfo.InvariantCulture);
                        bom.Add(new Device(weight, price));
                    }
                }
            }            
            return bom;
        }

        public static void Main(string[] args)
        {            
            BillOfMaterial bom;
            BillOfMaterial filtered;

            bom = readCSV("devices.csv");

            Console.WriteLine("All devices (ToString):");
            foreach (Device d in bom.GetDevices()) {
                Console.WriteLine(d);
            }
            Console.WriteLine();                     

            Console.WriteLine("Devices filtered by weight (Linq):");
            filtered = bom.FindDevicesLinq(100, 200);
            Console.WriteLine(filtered);
            
            Console.WriteLine("Devices filtered by weight (Delegate):");
            filtered = bom.FindDevicesDelegate(100, 200);
            Console.WriteLine(filtered);

            Console.WriteLine("Devices filtered by weight (Lambda):");
            filtered = bom.FindDevicesLambda(100, 200);
            Console.WriteLine(filtered);

        }
    }
}
