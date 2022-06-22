<div class="articles">


    @foreach ($news as $report)
        {{-- @dump($report) --}}
        <article class="card">
            @if (isset($report->url))
                <img src="{{ $report->imageUrl }}" alt="an image about the news">
            @else
                <img src="{{ $report['imageUrl'] }}" alt="{{ $report['title'] }}">
            @endif
            <div class="info">

                @if (isset($report->url))
                    @if (Auth::check())
                        <div class="like">

                            <input type="checkbox" class="cora" name="like" id="cora{{ ++$cont }}"
                                data-news="{{ $report->title }}" data-idNews="{{ $report->id }}"
                                data-summary="{{ $report->summary }}" data-publishedAt="{{ $report->publishedAt }}"
                                data-url="{{ $report->url }}" data-imageUrl="{{ $report->imageUrl }}"
                                @if ($report->heart == 1) checked @endif />

                            <label for="cora{{ $cont }}">
                                <x-heartSVG />
                            </label>
                        </div>
                    @endif
                    <h1>{{ $report->title }}</h1>
                    <p id="info-expl">{{ $report->summary }}</p>
                    <p>{{ $report->publishedAt }}</p>
                    <a href="{{ $report->url }}" target="blank" id="link">{{ __('Go to the article') }}</a>
                @else
                    @if (Auth::check())
                        <div class="like">

                            <input type="checkbox" class="cora" name="like" id="cora{{ ++$cont }}"
                                data-news="{{ $report['title'] }}"
                                @if (isset($report['id']))
                                data-idNews="{{ $report['id'] }}"
                                 @else
                                 data-idNews="{{ $report['idNotice'] }}"
                                 @endif
                                data-summary="{{ $report['summary'] }}"
                                data-publishedAt="{{ $report['publishedAt'] }}" data-url="{{ $report['url'] }}"
                                data-imageUrl="{{ $report['imageUrl'] }}"
                                @if ($report['heart'] == 1) checked @endif />

                            <label for="cora{{ $cont }}">
                                <x-heartSVG />
                            </label>
                        </div>
                    @endif

                    <h1>{{ $report['title'] }}</h1>
                    <p id="info-expl">{{ $report['summary'] }}</p>
                    <p>{{ $report['publishedAt'] }}</p>
                    <a href="{{ $report['url'] }}" target="blank" id="link">{{ __('Go to the article') }}</a>
                @endif
            </div>
        </article>
    @endforeach
    @if ($news->hasMorePages())
        <div class="load">
            <a wire:click="loadMore" id="loadMore">Load More</a>
        </div>
    @endif
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".cora").click(function() {



            // alert(dataNews);
            $.ajax({
                url: "{{ route('news.like', app()->getLocale()) }}",
                method: 'GET',

                data: {
                    id: $(this).attr('id'),
                    _token: $('input[name="_token"]').val(),
                    dataNews: $(this).attr("data-news"),
                    userId: {{ Auth::id() }},
                    idNews: $(this).attr("data-idNews"),
                    summary: $(this).attr("data-summary"),
                    publishedAt: $(this).attr("data-publishedAt"),
                    url: $(this).attr("data-url"),
                    imageUrl: $(this).attr("data-imageUrl"),
                    heart: $(this).prop('checked'),

                }
            }).done(function(res) {
                // console.log(res);
            });
        });
    </script>
</div>
