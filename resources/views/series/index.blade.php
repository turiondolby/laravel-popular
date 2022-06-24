@foreach($all_series as $series)
    <div>
        <a href="/series/{{ $series->slug }}">{{ $series->title }}</a>
        {{ $series->visits_count_total }}
    </div>
@endforeach
