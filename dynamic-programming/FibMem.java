import java.util.ArrayList;

public class FibMem
{
	private ArrayList<Long> computed = new ArrayList<Long>();

	private long f (int n)
	{
		if (n < computed.size())
		{
			return computed.get(n);
		}

		Long l = this.f(n-1) + this.f(n-2);

		// memoize
		computed.add(l);

		return l;
	}

	public FibMem ()
	{
		computed.add(0L);
		computed.add(1L);
	}

	public static void main (String ... args)
	{
		FibMem printer = new FibMem();
		System.out.println(printer.f(92)); // beyond 92 overflows Long
	}
}
