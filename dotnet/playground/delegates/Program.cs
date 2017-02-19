// See: https://www.tutorialspoint.com/csharp/csharp_delegates.htm

using System;

delegate void Notifier(string sender);
delegate int Math(int value);

namespace ConsoleApplication
{
    public class GreetingService {
        public delegate void Notifier(string sender);
        public event Notifier greetings;

        public void Notify(string message) {
            if (greetings != null) {
                greetings(message);
            }
        }
    }

    public class Program
    {
        static int num = 1;

        static void SayHello(string sender) {
            Console.WriteLine("Hello from " + sender);
        }
        static void SayGoodbye(string sender) {
            Console.WriteLine("Goodbye from " + sender);
        }        
        static void SayHelloAgain(string sender) {
            Console.WriteLine("Hello again from " + sender);
        }

        static int Add(int value) {
            num += value;
            return num;
        }

        static int Multiply(int value) {
            num *= value;
            return num;
        }

        static void DelegateExamples()
        {
            // Keine Rückgabewerte/Strings
            Notifier greetings;
            greetings = new Notifier(SayHello);
            greetings += new Notifier(SayGoodbye);
            greetings += new Notifier(SayHelloAgain);
            greetings("me");

            // Integer als Rückgabewerte
            Math math;
            math = new Math(Add);
            math += new Math(Add);
            math += new Math(Multiply);
            math += new Math(Multiply);

            math(5);
            Console.WriteLine(num);

            // Kurzform
            Math addition;
            addition = Add;
            addition += Add;
            addition += Add;
            addition += Add;

            addition(10);
            Console.WriteLine(num);               
        }
        
        static void EventExamples() {
            GreetingService svc = new GreetingService();
            svc.greetings += SayHello;
            svc.greetings += SayGoodbye;
            svc.greetings += SayHelloAgain;
            svc.Notify("Tom & Jerry");
        }

        public static void Main(string[] args)
        {
            DelegateExamples();
            EventExamples();
        }
    }
}
