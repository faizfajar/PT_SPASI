KOLOM = {{ $column }}
<br>
ROW = {{ $row }}
<br>
<table border='1'>
  @for($i = 0; $i < $row; $i++)
    <tr>
      @for($j = 0; $j < $column; $j++)
        @if ($i == 0 && $j < 1)
          <td>{{ $a }}</td>
          <td>{{ $b }}</td>
          @php
          $j += 1;    
          @endphp
        @else
            @php
            $c = $a + $b;
            @endphp
            <td>{{ $c }}</td>
            @php
            $a = $b;
            $b = $c;
            @endphp
        @endif
      @endfor
    </tr>
  @endfor

</table>

{{-- Rumus FIBONACI
    c = a+b
    a = b
    b = c    
--}}