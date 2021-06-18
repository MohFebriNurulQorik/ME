"use strict";
var Layout = function () {
        function e() {
            $(".sidenav-toggler").addClass("active"), $(".sidenav-toggler").data("action", "sidenav-unpin"), $("body").removeClass("g-sidenav-hidden").addClass("g-sidenav-show g-sidenav-pinned"), $("body").append('<div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target=' + $("#sidenav-main").data("target") + " />"), Cookies.set("sidenav-state", "pinned")
        }

        function a() {
            $(".sidenav-toggler").removeClass("active"), $(".sidenav-toggler").data("action", "sidenav-pin"), $("body").removeClass("g-sidenav-pinned").addClass("g-sidenav-hidden"), $("body").find(".backdrop").remove(), Cookies.set("sidenav-state", "unpinned")
        }
        var t = Cookies.get("sidenav-state") ? Cookies.get("sidenav-state") : "pinned";
        $(window).width() > 1200 && ("pinned" == t && e(), "unpinned" == Cookies.get("sidenav-state") && a(), $(window).resize(function () {
            $("body").hasClass("g-sidenav-show") && !$("body").hasClass("g-sidenav-pinned") && $("body").removeClass("g-sidenav-show").addClass("g-sidenav-hidden")
        })), $(window).width() < 1200 && ($("body").removeClass("g-sidenav-hide").addClass("g-sidenav-hidden"), $("body").removeClass("g-sidenav-show"), $(window).resize(function () {
            $("body").hasClass("g-sidenav-show") && !$("body").hasClass("g-sidenav-pinned") && $("body").removeClass("g-sidenav-show").addClass("g-sidenav-hidden")
        })), $("body").on("click", "[data-action]", function (t) {
            t.preventDefault();
            var n = $(this),
                i = n.data("action");
            n.data("target");
            switch (i) {
                case "sidenav-pin":
                    e();
                    break;
                case "sidenav-unpin":
                    a();
                    break;
                case "search-show":
                    n.data("target"), $("body").removeClass("g-navbar-search-show").addClass("g-navbar-search-showing"), setTimeout(function () {
                        $("body").removeClass("g-navbar-search-showing").addClass("g-navbar-search-show")
                    }, 150), setTimeout(function () {
                        $("body").addClass("g-navbar-search-shown")
                    }, 300);
                    break;
                case "search-close":
                    n.data("target"), $("body").removeClass("g-navbar-search-shown"), setTimeout(function () {
                        $("body").removeClass("g-navbar-search-show").addClass("g-navbar-search-hiding")
                    }, 150), setTimeout(function () {
                        $("body").removeClass("g-navbar-search-hiding").addClass("g-navbar-search-hidden")
                    }, 300), setTimeout(function () {
                        $("body").removeClass("g-navbar-search-hidden")
                    }, 500)
            }
        }), $(".sidenav").on("mouseenter", function () {
            $("body").hasClass("g-sidenav-pinned") || $("body").removeClass("g-sidenav-hide").removeClass("g-sidenav-hidden").addClass("g-sidenav-show")
        }), $(".sidenav").on("mouseleave", function () {
            $("body").hasClass("g-sidenav-pinned") || ($("body").removeClass("g-sidenav-show").addClass("g-sidenav-hide"), setTimeout(function () {
                $("body").removeClass("g-sidenav-hide").addClass("g-sidenav-hidden")
            }, 300))
        }), $(window).on("load resize", function () {
            $("body").height() < 800 && ($("body").css("min-height", "100vh"), $("#footer-main").addClass("footer-auto-bottom"))
        })
    }(),
    Charts = function () {
        var e, a = $('[data-toggle="chart"]'),
            t = "light",
            n = {
                base: "Open Sans"
            },
            i = {
                gray: {
                    100: "#f6f9fc",
                    200: "#e9ecef",
                    300: "#dee2e6",
                    400: "#ced4da",
                    500: "#adb5bd",
                    600: "#8898aa",
                    700: "#525f7f",
                    800: "#32325d",
                    900: "#212529"
                },
                theme: {
                    default: "#172b4d",
                    primary: "#5e72e4",
                    secondary: "#f4f5f7",
                    info: "#11cdef",
                    success: "#2dce89",
                    danger: "#f5365c",
                    warning: "#fb6340"
                },
                black: "#12263F",
                white: "#FFFFFF",
                transparent: "transparent"
            };

        function o(e, a) {
            for (var t in a) "object" != typeof a[t] ? e[t] = a[t] : o(e[t], a[t])
        }

        function s(e) {
            var a = e.data("add"),
                t = $(e.data("target")).data("chart");
            e.is(":checked") ? (! function e(a, t) {
                for (var n in t) Array.isArray(t[n]) ? t[n].forEach(function (e) {
                    a[n].push(e)
                }) : e(a[n], t[n])
            }(t, a), t.update()) : (! function e(a, t) {
                for (var n in t) Array.isArray(t[n]) ? t[n].forEach(function (e) {
                    a[n].pop()
                }) : e(a[n], t[n])
            }(t, a), t.update())
        }

        function l(e) {
            var a = e.data("update"),
                t = $(e.data("target")).data("chart");
            o(t, a),
                function (e, a) {
                    if (void 0 !== e.data("prefix") || void 0 !== e.data("prefix")) {
                        var t = e.data("prefix") ? e.data("prefix") : "",
                            n = e.data("suffix") ? e.data("suffix") : "";
                        a.options.scales.yAxes[0].ticks.callback = function (e) {
                            if (!(e % 10)) return t + e + n
                        }, a.options.tooltips.callbacks.label = function (e, a) {
                            var i = a.datasets[e.datasetIndex].label || "",
                                o = e.yLabel,
                                s = "";
                            return a.datasets.length > 1 && (s += '<span class="popover-body-label mr-auto">' + i + "</span>"), s += '<span class="popover-body-value">' + t + o + n + "</span>"
                        }
                    }
                }(e, t), t.update()
        }
        return window.Chart && o(Chart, (e = {
            defaults: {
                global: {
                    responsive: !0,
                    maintainAspectRatio: !1,
                    defaultColor: "dark" == t ? i.gray[700] : i.gray[600],
                    defaultFontColor: "dark" == t ? i.gray[700] : i.gray[600],
                    defaultFontFamily: n.base,
                    defaultFontSize: 13,
                    layout: {
                        padding: 0
                    },
                    legend: {
                        display: !1,
                        position: "bottom",
                        labels: {
                            usePointStyle: !0,
                            padding: 16
                        }
                    },
                    elements: {
                        point: {
                            radius: 0,
                            backgroundColor: i.theme.primary
                        },
                        line: {
                            tension: .4,
                            borderWidth: 4,
                            borderColor: i.theme.primary,
                            backgroundColor: i.transparent,
                            borderCapStyle: "rounded"
                        },
                        rectangle: {
                            backgroundColor: i.theme.warning
                        },
                        arc: {
                            backgroundColor: i.theme.primary,
                            borderColor: "dark" == t ? i.gray[800] : i.white,
                            borderWidth: 4
                        }
                    },
                    tooltips: {
                        enabled: !0,
                        mode: "index",
                        intersect: !1
                    }
                },
                doughnut: {
                    cutoutPercentage: 83,
                    legendCallback: function (e) {
                        var a = e.data,
                            t = "";
                        return a.labels.forEach(function (e, n) {
                            var i = a.datasets[0].backgroundColor[n];
                            t += '<span class="chart-legend-item">', t += '<i class="chart-legend-indicator" style="background-color: ' + i + '"></i>', t += e, t += "</span>"
                        }), t
                    }
                }
            }
        }, Chart.scaleService.updateScaleDefaults("linear", {
            gridLines: {
                borderDash: [2],
                borderDashOffset: [2],
                color: "dark" == t ? i.gray[900] : i.gray[300],
                drawBorder: !1,
                drawTicks: !1,
                drawOnChartArea: !0,
                zeroLineWidth: 0,
                zeroLineColor: "rgba(0,0,0,0)",
                zeroLineBorderDash: [2],
                zeroLineBorderDashOffset: [2]
            },
            ticks: {
                beginAtZero: !0,
                padding: 10,
                callback: function (e) {
                    if (!(e % 10)) return e
                }
            }
        }), Chart.scaleService.updateScaleDefaults("category", {
            gridLines: {
                drawBorder: !1,
                drawOnChartArea: !1,
                drawTicks: !1
            },
            ticks: {
                padding: 20
            },
            maxBarThickness: 10
        }), e)), a.on({
            change: function () {
                var e = $(this);
                e.is("[data-add]") && s(e)
            },
            click: function () {
                var e = $(this);
                e.is("[data-update]") && l(e)
            }
        }), {
            colors: i,
            fonts: n,
            mode: t
        }
    }(),
    CopyIcon = function () {
        var e, a = ".btn-icon-clipboard",
            t = $(a);
        t.length && ((e = t).tooltip().on("mouseleave", function () {
            e.tooltip("hide")
        }), new ClipboardJS(a).on("success", function (e) {
            $(e.trigger).attr("title", "Copied!").tooltip("_fixTitle").tooltip("show").attr("title", "Copy to clipboard").tooltip("_fixTitle"), e.clearSelection()
        }))
    }(),
    Navbar = function () {
        var e = $(".navbar-nav, .navbar-nav .nav"),
            a = $(".navbar .collapse"),
            t = $(".navbar .dropdown");
        a.on({
            "show.bs.collapse": function () {
                var t;
                (t = $(this)).closest(e).find(a).not(t).collapse("hide")
            }
        }), t.on({
            "hide.bs.dropdown": function () {
                var e, a;
                e = $(this), (a = e.find(".dropdown-menu")).addClass("close"), setTimeout(function () {
                    a.removeClass("close")
                }, 200)
            }
        })
    }(),
    NavbarCollapse = function () {
        $(".navbar-nav");
        var e = $(".navbar .navbar-custom-collapse");
        e.length && (e.on({
            "hide.bs.collapse": function () {
                e.addClass("collapsing-out")
            }
        }), e.on({
            "hidden.bs.collapse": function () {
                e.removeClass("collapsing-out")
            }
        }))
    }(),
    Popover = function () {
        var e = $('[data-toggle="popover"]'),
            a = "";
        e.length && e.each(function () {
            ! function (e) {
                e.data("color") && (a = "popover-" + e.data("color"));
                var t = {
                    trigger: "focus",
                    template: '<div class="popover ' + a + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
                };
                e.popover(t)
            }($(this))
        })
    }(),
    ScrollTo = function () {
        var e = $(".scroll-me, [data-scroll-to], .toc-entry a");

        function a(e) {
            var a = e.attr("href"),
                t = e.data("scroll-to-offset") ? e.data("scroll-to-offset") : 0,
                n = {
                    scrollTop: $(a).offset().top - t
                };
            $("html, body").stop(!0, !0).animate(n, 600), event.preventDefault()
        }
        e.length && e.on("click", function (e) {
            a($(this))
        })
    }(),
    Tooltip = function () {
        var e = $('[data-toggle="tooltip"]');
        e.length && e.tooltip()
    }(),
    Checklist = function () {
        var e = $('[data-toggle="checklist"]');

        function a(e) {
            e.is(":checked") ? e.closest(".checklist-item").addClass("checklist-item-checked") : e.closest(".checklist-item").removeClass("checklist-item-checked")
        }
        e.length && (e.each(function () {
            $(this).find('.checklist-entry input[type="checkbox"]').each(function () {
                a($(this))
            })
        }), e.find('input[type="checkbox"]').on("change", function () {
            a($(this))
        }))
    }(),
    FormControl = function () {
        var e = $(".form-control");
        e.length && e.on("focus blur", function (e) {
            $(this).parents(".form-group").toggleClass("focused", "focus" === e.type)
        }).trigger("blur")
    }(),
    color = "#5e72e4";

function initMap() {
    map = document.getElementById("map-default"), lat = map.getAttribute("data-lat"), lng = map.getAttribute("data-lng");
    var e = new google.maps.LatLng(lat, lng),
        a = {
            zoom: 12,
            scrollwheel: !1,
            center: e,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    map = new google.maps.Map(map, a);
    var t = new google.maps.Marker({
            position: e,
            map: map,
            animation: google.maps.Animation.DROP,
            title: "Hello World!"
        }),
        n = new google.maps.InfoWindow({
            content: '<div class="info-window-content"><h2>Argon Dashboard PRO</h2><p>A beautiful premium dashboard for Bootstrap 4.</p></div>'
        });
    google.maps.event.addListener(t, "click", function () {
        n.open(map, t)
    })
}($map = $("#map-default")).length && google.maps.event.addDomListener(window, "load", initMap);
var map, lat, lng, $map = $("#map-custom");
color = "#5e72e4";

function initMap() {
    map = document.getElementById("map-custom"), lat = map.getAttribute("data-lat"), lng = map.getAttribute("data-lng");
    var e = new google.maps.LatLng(lat, lng),
        a = {
            zoom: 12,
            scrollwheel: !1,
            center: e,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                featureType: "administrative",
                elementType: "labels.text.fill",
                stylers: [{
                    color: "#444444"
                }]
            }, {
                featureType: "landscape",
                elementType: "all",
                stylers: [{
                    color: "#f2f2f2"
                }]
            }, {
                featureType: "poi",
                elementType: "all",
                stylers: [{
                    visibility: "off"
                }]
            }, {
                featureType: "road",
                elementType: "all",
                stylers: [{
                    saturation: -100
                }, {
                    lightness: 45
                }]
            }, {
                featureType: "road.highway",
                elementType: "all",
                stylers: [{
                    visibility: "simplified"
                }]
            }, {
                featureType: "road.arterial",
                elementType: "labels.icon",
                stylers: [{
                    visibility: "off"
                }]
            }, {
                featureType: "transit",
                elementType: "all",
                stylers: [{
                    visibility: "off"
                }]
            }, {
                featureType: "water",
                elementType: "all",
                stylers: [{
                    color: color
                }, {
                    visibility: "on"
                }]
            }]
        };
    map = new google.maps.Map(map, a);
    var t = new google.maps.Marker({
            position: e,
            map: map,
            animation: google.maps.Animation.DROP,
            title: "Hello World!"
        }),
        n = new google.maps.InfoWindow({
            content: '<div class="info-window-content"><h2>Argon Dashboard PRO</h2><p>A beautiful premium dashboard for Bootstrap 4.</p></div>'
        });
    google.maps.event.addListener(t, "click", function () {
        n.open(map, t)
    })
}
var BarStackedChart = function () {
        var e, a, t, n, i = $("#chart-bar-stacked");
        i.length && (e = i, a = function () {
            return Math.round(100 * Math.random())
        }, t = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "Dataset 1",
                backgroundColor: Charts.colors.theme.danger,
                data: [a(), a(), a(), a(), a(), a(), a()]
            }, {
                label: "Dataset 2",
                backgroundColor: Charts.colors.theme.primary,
                data: [a(), a(), a(), a(), a(), a(), a()]
            }, {
                label: "Dataset 3",
                backgroundColor: Charts.colors.theme.success,
                data: [a(), a(), a(), a(), a(), a(), a()]
            }]
        }, n = new Chart(e, {
            type: "bar",
            data: t,
            options: {
                tooltips: {
                    mode: "index",
                    intersect: !1
                },
                responsive: !0,
                scales: {
                    xAxes: [{
                        stacked: !0
                    }],
                    yAxes: [{
                        stacked: !0
                    }]
                }
            }
        }), e.data("chart", n))
    }(),
    DoughnutChart = function () {
        var e, a, t, n = $("#chart-doughnut");
        n.length && (e = n, a = function () {
            return Math.round(100 * Math.random())
        }, t = new Chart(e, {
            type: "doughnut",
            data: {
                labels: ["Danger", "Warning", "Success", "Primary", "Info"],
                datasets: [{
                    data: [a(), a(), a(), a(), a()],
                    backgroundColor: [Charts.colors.theme.danger, Charts.colors.theme.warning, Charts.colors.theme.success, Charts.colors.theme.primary, Charts.colors.theme.info],
                    label: "Dataset 1"
                }]
            },
            options: {
                responsive: !0,
                legend: {
                    position: "top"
                },
                animation: {
                    animateScale: !0,
                    animateRotate: !0
                }
            }
        }), e.data("chart", t))
    }(),
    PieChart = function () {
        var e, a, t, n = $("#chart-pie");
        n.length && (e = n, a = function () {
            return Math.round(100 * Math.random())
        }, t = new Chart(e, {
            type: "pie",
            data: {
                labels: ["Danger", "Warning", "Success", "Primary", "Info"],
                datasets: [{
                    data: [a(), a(), a(), a(), a()],
                    backgroundColor: [Charts.colors.theme.danger, Charts.colors.theme.warning, Charts.colors.theme.success, Charts.colors.theme.primary, Charts.colors.theme.info],
                    label: "Dataset 1"
                }]
            },
            options: {
                responsive: !0,
                legend: {
                    position: "top"
                },
                animation: {
                    animateScale: !0,
                    animateRotate: !0
                }
            }
        }), e.data("chart", t))
    }(),
    PointsChart = function () {
        var e, a, t = $("#chart-points");
        t.length && (e = t, a = new Chart(e, {
            type: "line",
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: Charts.colors.gray[200],
                            zeroLineColor: Charts.colors.gray[200]
                        },
                        ticks: {}
                    }]
                }
            },
            data: {
                labels: ["May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Performance",
                    data: [10, 18, 28, 23, 28, 40, 36, 46, 52],
                    pointRadius: 10,
                    pointHoverRadius: 15,
                    showLine: !1
                }]
            }
        }), e.data("chart", a))
    }(),
    SalesChart = function () {
        var e, a, t = $("#chart-sales-dark");
        t.length && (e = t, a = new Chart(e, {
            type: "line",
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: Charts.colors.gray[700],
                            zeroLineColor: Charts.colors.gray[700]
                        },
                        ticks: {}
                    }]
                }
            },
            data: {
                labels: ["May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Performance",
                    data: [0, 20, 10, 30, 15, 40, 20, 60, 60]
                }]
            }
        }), e.data("chart", a))
    }(),
    BarsChart = (SalesChart = function () {
        var e, a, t = $("#chart-sales");
        t.length && (e = t, a = new Chart(e, {
            type: "line",
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: Charts.colors.gray[200],
                            zeroLineColor: Charts.colors.gray[200]
                        },
                        ticks: {}
                    }]
                }
            },
            data: {
                labels: ["May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Performance",
                    data: [0, 20, 10, 30, 15, 40, 20, 60, 60]
                }]
            }
        }), e.data("chart", a))
    }(), function () {
        var e = $("#chart-bars");
        e.length && function (e) {
            var a = new Chart(e, {
                type: "bar",
                data: {
                    labels: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Sales",
                        data: [25, 20, 30, 22, 17, 29]
                    }]
                }
            });
            e.data("chart", a)
        }(e)
    }()),
    LineChart = function () {
        var e, a, t = $("#chart-line");
        t.length && (e = t, a = new Chart(e, {
            type: "line",
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            color: Charts.colors.gray[200],
                            zeroLineColor: Charts.colors.gray[200]
                        },
                        ticks: {}
                    }]
                }
            },
            data: {
                labels: ["May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Performance",
                    data: [0, 20, 10, 30, 15, 40, 20, 60, 60]
                }]
            }
        }), e.data("chart", a))
    }();
// if ($('[data-toggle="widget-calendar"]')[0]) {
//     console.log('efebri');
//     $('[data-toggle="widget-calendar"]').fullCalendar({
//         contentHeight: "auto",
//         theme: !1,
//         buttonIcons: {
//             prev: " ni ni-bold-left",
//             next: " ni ni-bold-right"
//         },
//         header: {
//             right: "next",
//             center: "title, ",
//             left: "prev"
//         },
//         defaultDate: "2018-12-01",
//         editable: !0,
//         events: [{
//             title: "Call with Dave",
//             start: "2018-11-18",
//             end: "2018-11-18",
//             className: "bg-red"
//         }, {
//             title: "Lunch meeting",
//             start: "2018-11-21",
//             end: "2018-11-22",
//             className: "bg-orange"
//         }, {
//             title: "All day conference",
//             start: "2018-11-29",
//             end: "2018-11-29",
//             className: "bg-green"
//         }, {
//             title: "Meeting with Mary",
//             start: "2018-12-01",
//             end: "2018-12-01",
//             className: "bg-blue"
//         }, {
//             title: "Winter Hackaton",
//             start: "2018-12-03",
//             end: "2018-12-03",
//             className: "bg-red"
//         }, {
//             title: "Digital event",
//             start: "2018-12-07",
//             end: "2018-12-09",
//             className: "bg-warning"
//         }, {
//             title: "Marketing event",
//             start: "2018-12-10",
//             end: "2018-12-10",
//             className: "bg-purple"
//         }, {
//             title: "Dinner with Family",
//             start: "2018-12-19",
//             end: "2018-12-19",
//             className: "bg-red"
//         }, {
//             title: "Black Friday",
//             start: "2018-12-23",
//             end: "2018-12-23",
//             className: "bg-blue"
//         }, {
//             title: "Cyber Week",
//             start: "2018-12-02",
//             end: "2018-12-02",
//             className: "bg-yellow"
//         }]
//     });
//     var mYear = moment().format("YYYY"),
//         mDay = moment().format("dddd, MMM D");
//     $(".widget-calendar-year").html(mYear), $(".widget-calendar-day").html(mDay)
// }
 
