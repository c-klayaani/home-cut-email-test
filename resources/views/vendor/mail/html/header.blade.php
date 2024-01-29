<tr>
    <td class="header">
        <a href="https://homecut.app" style="display: inline-block;">
            @if (trim($slot) === 'HomeCut')
                <img src="https://homecut.app/wp-content/uploads/2022/07/New-Project.png" alt="HomeCut">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
