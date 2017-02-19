using System;

class Arrays 
{
    static void Main(string[] args)
    {
        Console.WriteLine("Eindimensionale Arrays");
        
        int[] array = new int[5];

        array[0] = 11;
        array[1] = 22;
        array[2] = 33;
        array[3] = 44;
        array[4] = 55;

        // Foreach - Schleife
        Console.WriteLine("\nForeach - Schleife");
        foreach (int n in array) {
            Console.WriteLine(n);
        }

        // For - Schleife
        Console.WriteLine("\nFor - Schleife");
        for (int i=0; i < array.Length; i++) {
            Console.WriteLine(array[i]);            
        }

        // While - Schleife
        Console.WriteLine("\nWhile - Schleife");
        int j = 0;
        while (j < 5) {
            Console.WriteLine(array[j]);            
            j++;            
        }

        // Do - Schleife
        Console.WriteLine("\nDo - Schleife");        
        int k = 0;
        do {
            Console.WriteLine(array[k]);
            k++;                        
        } while (k < 5);

        // Mehrdimensionale Arrays
        Console.WriteLine("\nMehrdimensionale Arrays");

        int [][] matrix = new int[4][];
        matrix[0] = new int[5]{1, 2, 3, 4, 5};
        matrix[1] = new int[5]{6, 7, 8, 9, 10};
        matrix[2] = new int[5]{11, 12, 13, 14, 15};
        matrix[3] = new int[5]{16, 17, 18, 19, 20};

        foreach (int[] row in matrix) {
            foreach (int col in row) {
                Console.Write(col + " ");
            }
            Console.Write("\n");
        }

        // Array Initialisierung
        Console.WriteLine("\nArray Initialisierung");
        
        int [] p = new int[3];
        int [][] a = new int [2][];
        //a[0] = {1, 2, 3}; // --> geht nicht
        string[] names = {"Thomas", "Markus", "Andreas"};
        int[] nums = {1, 2, 3, 4, 5};

        int[,] numbers = new int[3, 2] { {1, 2}, {3, 4}, {5, 6} };
        string[,] siblings = new string[2, 2] { {"Mike","Amy"}, {"Mary","Albert"} };

        int[,] numbers2 = { {1, 2}, {3, 0}, {5, 6}, {7, 8}, {9, 10} };
        numbers2[1, 1] = 4;     
        //numbers2[1][1] = 58;
        //numbers2[1][1] = 667;
        Console.WriteLine("Länge = " + numbers2.Length);

        foreach (int x in numbers2) {
            Console.Write(x + " ");
        }
        Console.Write("\n");

        for (int x=0; x<5; x++) {
            Console.Write(numbers2[x, 0] + "->" + numbers2[x, 1]);
            Console.Write(", ");
        }
        Console.Write("\n");        

    }
}
