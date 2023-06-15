<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            @if ($breadcrumb)
                @foreach ($breadcrumb as $item)
                    @if ($loop->last)
                        <li class="breadcrumb-item active">{{ $item['title'] }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></li>
                    @endif
                @endforeach
            @endif
        </ol>
    </nav>
</div><!-- End Page Title -->
