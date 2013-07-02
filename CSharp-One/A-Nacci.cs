using System;

namespace ANacci
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.Write("Въведете първата буква от поредицата: ");
            int letterOne = ((int)Char.ToUpper((char.Parse(Console.ReadLine())))) - 64;

            Console.Write("Въведете втората буква от поредицата: ");
            int letterTwo = ((int)Char.ToUpper((char.Parse(Console.ReadLine())))) - 64;

            Console.Write("Въведете дължината на поредицата: ");
            int size = int.Parse(Console.ReadLine());

            Console.WriteLine((char)(letterOne + 64));            

            for (int i = 0; i < size-1; i++)
            {
                int tmpResult = letterOne + letterTwo;

                if (tmpResult > 26)
                {
                    tmpResult = tmpResult - 26;
                }

                Console.Write((char) (letterTwo+64));
                
                for (int j = 0; j < i; j++)
                {
                    Console.Write(" ");
                }

                Console.Write((char)(tmpResult + 64));

                letterOne = letterTwo;
                letterTwo = tmpResult;
                tmpResult += letterOne;

                if (tmpResult > 26)
                {
                    tmpResult = tmpResult - 26;
                }

                letterOne = letterTwo;
                letterTwo = tmpResult;

                Console.WriteLine();
            }
        }
    }
}
