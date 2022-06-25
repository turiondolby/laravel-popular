@foreach($all_series as $series)
    <div>
        <a href="/series/{{ $series->slug }}">{{ $series->title }}</a>
        (all time: {{ $series->visits_count_total }}, current scope: {{ $series->visit_count }})
    </div>
@endforeach
