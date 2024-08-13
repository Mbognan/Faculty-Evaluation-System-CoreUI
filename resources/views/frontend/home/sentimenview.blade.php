@extends('frontend.layouts.master')

@section('home')
    @auth



<section class="fp__breadcrumb" style="background: url('{{ asset('uploads/back.jpg') }}');">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>user dashboard</h1>
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><a href="#">dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="fp__dashboard mt_70 xs_mt_90 mb_100 xs_mb_70">
    <div class="container">
        <div class="fp__dashboard_area">
            <div class="row">
                <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    @include('frontend.home.sidebar')
                </div>
                <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__dashboard_content">
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" >
                                <div class="fp_dashboard_body">

                                    <div class="fp__dsahboard_overview">


                                          <div id="container"></div>
                                          <hr>
                                          <div id="container2"></div>
                                        <hr>


                                    </div>
                                    <div class="fp_dashboard_body dashboard_review">
                                        <h3>Comments</h3>
                                        <div class="fp__review_area">
                                            <div class="fp__comment pt-0 mt_20">
                                                @foreach ($sentiments as $sentiment )
                                                      <div class="fp__single_comment m-1 border-1">
                                                    <img src="{{ asset('default/Macaco NFT 🐒🔥.jpeg') }}" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3><a href="#">Unknown Student</a> <span>29 oct 2022 </span>
                                                        </h3>
                                                        <span class="rating">
                                                            <span @if ($sentiment->sentiment === 'positive')
                                                                 class="status warning"
                                                            @elseif($sentiment->sentiment === 'negative')
                                                                  class="status inactive"
                                                            @elseif($sentiment->sentiment === 'neutral')
                                                            style="background-color:#ffc107"
                                                            @endif   class="status"  >{{ $sentiment->sentiment }}</span>
                                                            <b>(BSIT Student)</b>
                                                        </span>
                                                        <p>{{ $sentiment->comments->post_comment }}</p>

                                                    </div>
                                                </div>
                                                @endforeach


                                                <a href="#" class="load_more">load More</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @endauth



@endsection

@push('scripts')
<script src="{{ asset('admin/code/highcharts.js') }}"></script>
<script src="{{ asset('admin/code/modules/series-label.js') }}"></script>
<script src="{{ asset('admin/code/modules/exporting.js') }}"></script>
<script src="{{ asset('admin/code/modules/export-data.js') }}"></script>
<script src="{{ asset('admin/code/modules/accessibility.js') }}"></script>
<script src="{{ asset('admin/code/modules/wordcloud.js') }}"></script>


<script>
     $(document).ready(function() {
            let reviewsToShow = 3;
            let totalReviews = $(".fp__single_comment").length;


            $(".fp__single_comment").hide().slice(0, reviewsToShow).show();

            $(".load_more").on("click", function(e) {
                e.preventDefault();
                reviewsToShow = reviewsToShow + 2;
                $(".fp__single_comment").slice(0, reviewsToShow).slideDown();


                if (reviewsToShow >= totalReviews) {
                    $(".load_more").fadeOut();
                }
            });
        });
      document.addEventListener('DOMContentLoaded', function() {


   const comments = @json($comments);

   const text =  comments.join(" ");

   console.log(comments);
// List of stop words
const stopWords = [

];


const isStopWord = (word) => stopWords.includes(word.toLowerCase());



const lines = text.replace(/[():'?0-9]+/g, "").split(/[,\. ]+/g);
const filteredLines = lines.filter(word => word && !isStopWord(word));

const data = filteredLines.reduce((arr, word) => {
    let obj = Highcharts.find(arr, obj => obj.name === word);
    if (obj) {
        obj.weight += 1;
    } else {
        obj = {
            name: word,
            weight: 1,
        };
        arr.push(obj);
    }
    return arr;
}, []);

console.log(data);

Highcharts.chart("container2", {
    accessibility: {
        screenReaderSection: {
            beforeChartFormat:
                "<h5>{chartTitle}</h5>" +
                "<div>{chartSubtitle}</div>" +
                "<div>{chartLongdesc}</div>" +
                "<div>{viewTableButton}</div>",
        },
    },
    series: [
        {
            type: "wordcloud",
            data: data,
            name: "Occurrences",
            spiral: 'rectangular', // Use rectangular spiral for tighter packing
            rotation: {
                orientations: 1 // Keep orientation fixed to help with tight packing
            }
        },
    ],
    title: {
        text: "Most Commonly Used Word",
        align: "left",
    },
    subtitle: {
        text: "By student in this faculty",
        align: "left",
    },
    tooltip: {
        headerFormat:
            '<span style="font-size: 16px"><b>{point.key}</b>' + "</span><br>",
    },
        exporting: {
        enabled: false
        }
});




//dunot chart
(function (H) {
        H.seriesTypes.pie.prototype.animate = function (init) {
          const series = this,
            chart = series.chart,
            points = series.points,
            { animation } = series.options,
            { startAngleRad } = series;

          function fanAnimate(point, startAngleRad) {
            const graphic = point.graphic,
              args = point.shapeArgs;

            if (graphic && args) {
              graphic
                // Set inital animation values
                .attr({
                  start: startAngleRad,
                  end: startAngleRad,
                  opacity: 1,
                })
                // Animate to the final position
                .animate(
                  {
                    start: args.start,
                    end: args.end,
                  },
                  {
                    duration: animation.duration / points.length,
                  },
                  function () {
                    // On complete, start animating the next point
                    if (points[point.index + 1]) {
                      fanAnimate(points[point.index + 1], args.end);
                    }

                    if (point.index === series.points.length - 1) {
                      series.dataLabelsGroup.animate(
                        {
                          opacity: 1,
                        },
                        void 0,
                        function () {
                          points.forEach((point) => {
                            point.opacity = 1;
                          });
                          series.update(
                            {
                              enableMouseTracking: true,
                            },
                            false
                          );
                          chart.update({
                            plotOptions: {
                              pie: {
                                innerSize: "40%",
                                borderRadius: 8,
                              },
                            },
                          });
                        }
                      );
                    }
                  }
                );
            }
          }

          if (init) {
            // Hide points on init
            points.forEach((point) => {
              point.opacity = 0;
            });
          } else {
            fanAnimate(points[0], startAngleRad);
          }
        };
      })(Highcharts);

      let neutral = @json($neutralCount);
      let negative = @json($negativeCount);
      let positive = @json($positiveCount);



      Highcharts.chart("container", {
        chart: {
          type: "pie",
        },
        title: {
          text: "Statistics for sentiment analysis",
          align: "left",
        },
        subtitle: {
          text: "BSIT Faculty: Janeth Aclao",
          align: "left",
        },
        tooltip: {
          pointFormat: "{series.name}: <b>{point.percentage:.1f}%</b>",
            enabled: false // Disable the default tooltip

        },
        exporting: {
        enabled: false // Disable the export button
    },
        accessibility: {
          point: {
            valueSuffix: "%",
          },
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            borderWidth: 2,
            cursor: "pointer",
            dataLabels: {
              enabled: true,
              format: "<b>{point.name}</b><br>{point.percentage:.1f}%",
              distance: 20,
            },
          },
        },

        series: [
          {
            // Disable mouse tracking on load, enable after custom animation
            enableMouseTracking: false,
            animation: {
              duration: 2000,
            },
            colorByPoint: true,
            data: [
              {
                name: "Neutral",
                y: neutral,
              },
              {
                name: "Negative",
                y: negative,
              },
              {
                name: "Positive",
                y: positive,
              }
            ],
          },
        ],
      });
    });
</script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
