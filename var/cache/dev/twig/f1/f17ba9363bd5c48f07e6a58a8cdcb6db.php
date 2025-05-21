<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* planning/calendar.html.twig */
class __TwigTemplate_0c0c617fe217d7a187a380c9260a185f extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "planning/calendar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "planning/calendar.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Planning</title>

    <!-- FullCalendar CSS depuis jsdelivr (CORS OK) -->
    <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css\" rel=\"stylesheet\">

    <!-- FullCalendar JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.min.js\"></script>

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7f7f7;
        }
        #calendar {
            max-width: 1100px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        #generate {
            margin: 20px auto 0 auto;
            display: block;
            padding: 10px 28px;
            font-size: 1.1em;
            background: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background .2s;
        }
        #generate:hover {
            background: #388e3c;
        }
    </style>
</head>
<body>
    <button id=\"generate\">Générer automatiquement</button>
    <div id=\"calendar\"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                locale: 'fr',
                timeZone: 'Europe/Paris',
                nowIndicator: true,
                allDaySlot: false,
                slotMinTime: '06:00:00',
                slotMaxTime: '22:00:00',
                height: 'auto',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth'
                },
                events: '/planning/events',
                eventDidMount: function(info) {
                    // Coloration spéciale si besoin de personnel (libelle ou title détecté)
                    if (
                        (info.event.title && info.event.title.indexOf(\"Besoin de personnel\") !== -1)
                        || (info.event.extendedProps.libelle && info.event.extendedProps.libelle === \"Besoin de personnel\")
                    ) {
                        info.el.style.backgroundColor = \"#ffbdbd\";
                        info.el.style.borderColor = \"#e11\";
                        info.el.style.color = \"#c00\";
                        info.el.style.fontWeight = \"bold\";
                    }
                }
            });
            calendar.render();

            document.getElementById('generate').addEventListener('click', function () {
                const today = new Date();
                const year = today.getFullYear();
                const week = getWeekNumber(today);

                fetch('/planning/generate-ajax', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        year: year,
                        week: week,
                        morningCount: 2,
                        afternoonCount: 2
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'ok') {
                        calendar.refetchEvents();
                    }
                });
            });

            // Fonction pour obtenir le numéro de semaine ISO
            function getWeekNumber(d) {
                d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
                const dayNum = d.getUTCDay() || 7;
                d.setUTCDate(d.getUTCDate() + 4 - dayNum);
                const yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
                return Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
            }
        });
    </script>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "planning/calendar.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Planning</title>

    <!-- FullCalendar CSS depuis jsdelivr (CORS OK) -->
    <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css\" rel=\"stylesheet\">

    <!-- FullCalendar JS -->
    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales-all.min.js\"></script>

    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f7f7f7;
        }
        #calendar {
            max-width: 1100px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }
        #generate {
            margin: 20px auto 0 auto;
            display: block;
            padding: 10px 28px;
            font-size: 1.1em;
            background: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background .2s;
        }
        #generate:hover {
            background: #388e3c;
        }
    </style>
</head>
<body>
    <button id=\"generate\">Générer automatiquement</button>
    <div id=\"calendar\"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                locale: 'fr',
                timeZone: 'Europe/Paris',
                nowIndicator: true,
                allDaySlot: false,
                slotMinTime: '06:00:00',
                slotMaxTime: '22:00:00',
                height: 'auto',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridDay,timeGridWeek,dayGridMonth'
                },
                events: '/planning/events',
                eventDidMount: function(info) {
                    // Coloration spéciale si besoin de personnel (libelle ou title détecté)
                    if (
                        (info.event.title && info.event.title.indexOf(\"Besoin de personnel\") !== -1)
                        || (info.event.extendedProps.libelle && info.event.extendedProps.libelle === \"Besoin de personnel\")
                    ) {
                        info.el.style.backgroundColor = \"#ffbdbd\";
                        info.el.style.borderColor = \"#e11\";
                        info.el.style.color = \"#c00\";
                        info.el.style.fontWeight = \"bold\";
                    }
                }
            });
            calendar.render();

            document.getElementById('generate').addEventListener('click', function () {
                const today = new Date();
                const year = today.getFullYear();
                const week = getWeekNumber(today);

                fetch('/planning/generate-ajax', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        year: year,
                        week: week,
                        morningCount: 2,
                        afternoonCount: 2
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'ok') {
                        calendar.refetchEvents();
                    }
                });
            });

            // Fonction pour obtenir le numéro de semaine ISO
            function getWeekNumber(d) {
                d = new Date(Date.UTC(d.getFullYear(), d.getMonth(), d.getDate()));
                const dayNum = d.getUTCDay() || 7;
                d.setUTCDate(d.getUTCDate() + 4 - dayNum);
                const yearStart = new Date(Date.UTC(d.getUTCFullYear(), 0, 1));
                return Math.ceil((((d - yearStart) / 86400000) + 1) / 7);
            }
        });
    </script>
</body>
</html>
", "planning/calendar.html.twig", "C:\\wamp64\\www\\planningApp\\templates\\planning\\calendar.html.twig");
    }
}
