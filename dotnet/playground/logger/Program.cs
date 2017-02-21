using System;

// Siehe Musterloesungen / HE_11 / Fragen_Prüfung3 / 4

namespace ConsoleApplication
{
    public class Controller {
        public delegate void LogHandler(string message);
        public void Process(LogHandler logHandler)
        {
            if (logHandler != null) {
                logHandler("Process() begin");
            }
            
            // Do some stuff

            if (logHandler != null) {
                logHandler("Process() end");
            }            
        }        
    }

    public class App
    {
        static void Logger(string s)
        {
            Console.WriteLine(s);
        }

        public static void Main(string[] args)
        {
            App app = new App();
            Controller ctrl = new Controller();
            ctrl.Process(Logger);
        }
    }
}
