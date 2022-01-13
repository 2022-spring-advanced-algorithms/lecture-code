
public class Fib
{
	private long f (int n)
	{
		if (n <= 0)
		{
			return 0L;
		}
		if (n == 1)
		{
			return 1L;
		}

		return this.f(n-1) + this.f(n-2);
	}

	public static void main (String ... args)
	{
		Fib printer = new Fib();
		System.out.println(printer.f(53));
	}
}
