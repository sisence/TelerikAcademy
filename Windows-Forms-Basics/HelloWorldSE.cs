using System;
using System.Drawing;
using System.Windows.Forms;

namespace WindowsFormsApplication1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            Text = "Hello World Form";
            BackColor = SystemColors.Window;
            ForeColor = SystemColors.WindowText;
            ResizeRedraw = true;
        }

        protected override void OnPaint(PaintEventArgs e)
        {
            Graphics g = e.Graphics;
            string str = "Hello, world!";
            SizeF sizefText = g.MeasureString(str, Font);

            g.DrawString(str, Font, new SolidBrush(ForeColor), (ClientSize.Width - sizefText.Width) / 2, (ClientSize.Height - sizefText.Height) / 2);
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }
    }
}
