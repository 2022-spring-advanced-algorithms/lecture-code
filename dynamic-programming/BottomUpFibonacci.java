import java.util.ArrayList;

public class BottomUpFibonacci
{
	private long f (int n)
	{
		long nMinus2 = 0;
		long nMinus1 = 1;
		long result = 0;

		while (--n > 0)
		{
			result = nMinus1 + nMinus2;
			nMinus2 = nMinus1;
			nMinus1 = result;
		}
		return result;
	}

	public static void main (String ... args)
	{
		BottomUpFibonacci printer = new BottomUpFibonacci();
		System.out.println(printer.f(92)); // beyond 92 overflows Long
	}
}
