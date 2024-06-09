@extends('frontend.layouts.master')
<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    #container {
        height: 400px;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
</style>
@section('home')
    @auth
    <div class="container mt-4 mb-4">
        <div class="row">
            <div class="col-lg-3">
                @include('frontend.home.sidebar')
            </div>

            <div class="col-lg-9 ">
                <div class="dashboard_content">
                    <div class="manage_dashboard">
                        <div class="row">


                            <div class="col-xl-12">
                                <div class="active_package shadow p-3 mb-5 bg-white rounded" >
                                    <h4>Sentiment Analysis Overall</h4>
                                    <div id="container"></div>
                                    {{-- <p class="highcharts-description">
                                        The pie chart titled "Faculty Evaluation Result By Category" presents the performance
                                        evaluation of faculty members in the BSIT Department, highlighting strengths and areas
                                        for improvement across key categories: Commitment, Knowledge of Subjects, Management of
                                        Learning, and Teaching for Independent Learning.
                                    </p> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4">
              <div class="dashboard_content">
                  <div class="manage_dashboard">
                      <div class="row">


                          <div class="col-xl-12">
                              <div class="active_package shadow p-3 mb-5 bg-white rounded" >
                                  <h4>Sentiment Analysis Overall</h4>
                                  <div id="container2"></div>
                                  <p class="highcharts-description">
                                      The pie chart titled "Faculty Evaluation Result By Category" presents the performance
                                      evaluation of faculty members in the BSIT Department, highlighting strengths and areas
                                      for improvement across key categories: Commitment, Knowledge of Subjects, Management of
                                      Learning, and Teaching for Independent Learning.
                                  </p>
                                  <hr>
                                  <div class="my_listing">

                                    <h4 style="justify-content: space-between">All Comments
                                    </h4>
                                    {{ $dataTable->table() }}
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


        </div>

    </div>
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

   const comments = @json($comments);

   const text =  comments.join(" ");

// List of stop words
const stopWords = [
    "i", "me", "my", "myself", "we", "our", "ours", "ourselves", "you", "your", "yours",
    "yourself", "yourselves", "he", "him", "his", "himself", "she", "her", "hers", "herself",
    "it", "its", "itself", "they", "them", "their", "theirs", "themselves", "what", "which",
    "who", "whom", "this", "that", "these", "those", "am", "is", "are", "was", "were", "be",
    "been", "being", "have", "has", "had", "having", "do", "does", "did", "doing", "a", "an",
    "the", "and", "but", "if", "or", "because", "as", "until", "while", "of", "at", "by",
    "for", "with", "about",, "between", "into", "through", "during", "before",
    "after", , , "to", "from", "up", "down", "in", "out", "on", "off", "over",
    "under", "again", "further", "then", "once", "here", "there", "when", "where", "why",
    "how", "all", "any", "both", "each", "few", "more", , "other", "some", "such",
    "no", "nor", "not", "only", "own", "same", "so", "than", "too", "very", "s", "t", "can",
    "will", "just", "don", "should", "now"
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
            data,
            name: "Occurrences",
        },
    ],
    title: {
        text: "Wordcloud of Alice's Adventures in Wonderland",
        align: "left",
    },
    subtitle: {
        text: "An excerpt from chapter 1: Down the Rabbit-Hole",
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
                    // On the last point, fade in the data labels, then
                    // apply the inner size
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

      Highcharts.chart("container", {
        chart: {
          type: "pie",
        },
        title: {
          text: "Departamental Strength of the Company",
          align: "left",
        },
        subtitle: {
          text: "Custom animation of pie series",
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
              format: "<b>{point.name}</b><br>{point.percentage}%",
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
                y: 18,
              },
              {
                name: "Negative",
                y: 50.4,
              },
              {
                name: "Positive",
                y: 99,
              },
            ],
          },
        ],
      });
</script>
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
