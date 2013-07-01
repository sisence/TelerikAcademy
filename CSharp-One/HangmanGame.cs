using System;

namespace HangmanGame
{
    class Program
    {

        static void Main(string[] args)
        {

            string myWord = "apple";
            char[] viewWord = new char[myWord.Length];

            for (int i = 0; i < myWord.Length; i++)
            {
                viewWord[i] = '@';
            }
            int count = 0;
            int lives = 5;
            while (count < myWord.Length)
            {

                Console.WriteLine("Hangman Game");
                Console.WriteLine("Брой опити: {0}", lives);
                Console.Write("Търсената дума е: ");

                for (int i = 0; i < myWord.Length; i++)
                {

                    Console.Write(viewWord[i]);
                }

                Console.WriteLine();
                Console.Write("Въведете буква: ");
                ConsoleKeyInfo keyPressed = Console.ReadKey();
                Console.WriteLine();
                if (myWord.IndexOf(keyPressed.KeyChar) < 0)
                {
                    lives--;
                    if (lives < 1)
                    {
                        break;
                    }

                    Console.WriteLine("Опитай пак!");
                    System.Threading.Thread.Sleep(1000);
                    Console.Clear();
                }
                else
                {

                    for (int i = 0; i < myWord.Length; i++)
                    {

                        if (myWord[i] == keyPressed.KeyChar)
                        {
                            if (viewWord[i] == '@')
                            {
                                viewWord[i] = myWord[i];
                                count++;
                                Console.WriteLine("Браво!");
                            }
                            else
                            {
                                System.Console.Beep();
                                Console.WriteLine("Буквата е използвана. Въведете друга буква!");
                                System.Threading.Thread.Sleep(1000);
                                break;
                            }
                        }
                    }

                    System.Threading.Thread.Sleep(1000);
                    Console.Clear();
                }
            }
            if (lives == 0)
            {
                Console.WriteLine("Вие загубихте!");
            }
            else
            {
                Console.WriteLine("Вие победихте!");
            }
        }
    }
}
