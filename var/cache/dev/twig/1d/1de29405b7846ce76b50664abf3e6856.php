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
class __TwigTemplate_89e924dfdbeac3f471ae4f0205b8676f extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "planning/calendar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "planning/calendar.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Planning par groupe";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 6
        yield "  <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css\" rel=\"stylesheet\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 10
        yield "  <h1>Planning par groupe</h1>

  <div style=\"margin-bottom: 20px;\">
    <label for=\"groupe-select\">Choisir un groupe :</label>
    <select id=\"groupe-select\">
      ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["groupes"]) || array_key_exists("groupes", $context) ? $context["groupes"] : (function () { throw new RuntimeError('Variable "groupes" does not exist.', 15, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["groupe"]) {
            // line 16
            yield "        <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["groupe"], "id", [], "any", false, false, false, 16), "html", null, true);
            yield "\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["groupe"], "nom", [], "any", false, false, false, 16), "html", null, true);
            yield "</option>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['groupe'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        yield "    </select>

    <button id=\"generate-button\" style=\"margin-left: 15px;\">🔄 Générer planning auto</button>
  </div>

  <div id=\"calendar\" style=\"margin-top: 30px;\"></div>

  <div id=\"ajout-container\" style=\"display:none; margin-top:20px; background:#f9f9f9; padding:10px; border:1px solid #ccc;\">
    <label for=\"select-employe\">Ajouter un employé :</label>
    <select id=\"select-employe\"></select>

    <label for=\"input-debut\" style=\"margin-left: 10px;\">Heure début :</label>
    <input type=\"time\" id=\"input-debut\" value=\"06:45\">

    <label for=\"input-fin\" style=\"margin-left: 10px;\">Heure fin :</label>
    <input type=\"time\" id=\"input-fin\" value=\"14:00\">

    <button id=\"btn-ajouter-employe\" style=\"margin-left: 10px;\">✅ Ajouter</button>
  </div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 39
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 40
        yield "  <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js\"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const calendarEl = document.getElementById('calendar');
      const selectGroupe = document.getElementById('groupe-select');
      const generateButton = document.getElementById('generate-button');
      const selectEmploye = document.getElementById('select-employe');
      const inputDebut = document.getElementById('input-debut');
      const inputFin = document.getElementById('input-fin');
      const btnAjouter = document.getElementById('btn-ajouter-employe');
      const ajoutContainer = document.getElementById('ajout-container');

      let currentDate = null;
      let currentEmployes = [];

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        nowIndicator: true,
        locale: 'fr',
        slotMinTime: '06:45:00',
        slotMaxTime: '22:00:00',
        selectable: true,
        slotLabelFormat: { hour: '2-digit', minute: '2-digit', hour12: false },
        eventTimeFormat: { hour: '2-digit', minute: '2-digit', hour12: false },

        events: function (info, successCallback, failureCallback) {
          const groupeId = selectGroupe.value;
          fetch('/planning/events?groupe=' + groupeId)
            .then(response => response.json())
            .then(successCallback)
            .catch(failureCallback);
        },

        select: function (info) {
          const groupeId = selectGroupe.value;
          if (!groupeId) return;

          currentDate = info.startStr.split('T')[0];

          fetch('/planning/available', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
              start: info.startStr,
              end: info.endStr,
              groupe: groupeId
            })
          })
          .then(res => res.json())
          .then(employes => {
            currentEmployes = employes;
            if (employes.length === 0) {
              alert(\"Aucun employé disponible.\");
              return;
            }

            selectEmploye.innerHTML = \"\";
            employes.forEach(e => {
              const opt = document.createElement('option');
              opt.value = e.id;
              opt.text = `\${e.prenom} \${e.nom}`;
              selectEmploye.appendChild(opt);
            });

            ajoutContainer.style.display = \"block\";
          });
        },

        eventClick: function (info) {
          if (confirm(\"Supprimer ce créneau ?\")) {
            fetch('/planning/delete', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ id: info.event.id })
            }).then(() => info.event.remove());
          }
        },

        eventDrop: function (info) {
          updateEvent(info.event);
        },

        eventResize: function (info) {
          updateEvent(info.event);
        }
      });

      calendar.render();

      selectGroupe.addEventListener('change', () => calendar.refetchEvents());

      generateButton.addEventListener('click', function () {
        generateButton.disabled = true;
        generateButton.innerText = \"⏳ Génération...\";

        fetch('/planning/setup')
          .then(() => {
            generateButton.disabled = false;
            generateButton.innerText = \"✅ Planning généré\";
            calendar.refetchEvents();
            setTimeout(() => generateButton.innerText = \"🔄 Générer planning auto\", 2000);
          })
          .catch(() => {
            alert(\"Erreur de génération.\");
            generateButton.disabled = false;
            generateButton.innerText = \"🔄 Générer planning auto\";
          });
      });

      btnAjouter.addEventListener('click', function () {
        const selectedId = selectEmploye.value;
        const selected = currentEmployes.find(e => e.id == selectedId);
        const groupeId = selectGroupe.value;
        const start = inputDebut.value;
        const end = inputFin.value;

        if (!start || !end) {
          alert(\"Veuillez indiquer une heure de début et de fin.\");
          return;
        }

        fetch('/planning/add-ajax', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            nom: selected.nom,
            prenom: selected.prenom,
            date: currentDate,
            start: start,
            end: end,
            groupe: groupeId
          })
        }).then(res => res.json()).then(data => {
          if (data.success) {
            calendar.refetchEvents();
            calendar.gotoDate(currentDate);
            ajoutContainer.style.display = \"none\";
          } else {
            alert(data.message || \"Erreur lors de l’ajout.\");
          }
        });
      });

      function updateEvent(event) {
        fetch('/planning/update', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            id: event.id,
            start: event.start.toISOString(),
            end: event.end.toISOString()
          })
        })
        .then(res => res.json())
        .then(data => {
          if (data.status !== 'ok') {
            alert(\"Erreur de mise à jour.\");
            calendar.refetchEvents();
          }
        });
      }
    });
  </script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

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
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  192 => 40,  179 => 39,  149 => 18,  138 => 16,  134 => 15,  127 => 10,  114 => 9,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Planning par groupe{% endblock %}

{% block stylesheets %}
  <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css\" rel=\"stylesheet\">
{% endblock %}

{% block body %}
  <h1>Planning par groupe</h1>

  <div style=\"margin-bottom: 20px;\">
    <label for=\"groupe-select\">Choisir un groupe :</label>
    <select id=\"groupe-select\">
      {% for groupe in groupes %}
        <option value=\"{{ groupe.id }}\">{{ groupe.nom }}</option>
      {% endfor %}
    </select>

    <button id=\"generate-button\" style=\"margin-left: 15px;\">🔄 Générer planning auto</button>
  </div>

  <div id=\"calendar\" style=\"margin-top: 30px;\"></div>

  <div id=\"ajout-container\" style=\"display:none; margin-top:20px; background:#f9f9f9; padding:10px; border:1px solid #ccc;\">
    <label for=\"select-employe\">Ajouter un employé :</label>
    <select id=\"select-employe\"></select>

    <label for=\"input-debut\" style=\"margin-left: 10px;\">Heure début :</label>
    <input type=\"time\" id=\"input-debut\" value=\"06:45\">

    <label for=\"input-fin\" style=\"margin-left: 10px;\">Heure fin :</label>
    <input type=\"time\" id=\"input-fin\" value=\"14:00\">

    <button id=\"btn-ajouter-employe\" style=\"margin-left: 10px;\">✅ Ajouter</button>
  </div>
{% endblock %}

{% block javascripts %}
  <script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js\"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const calendarEl = document.getElementById('calendar');
      const selectGroupe = document.getElementById('groupe-select');
      const generateButton = document.getElementById('generate-button');
      const selectEmploye = document.getElementById('select-employe');
      const inputDebut = document.getElementById('input-debut');
      const inputFin = document.getElementById('input-fin');
      const btnAjouter = document.getElementById('btn-ajouter-employe');
      const ajoutContainer = document.getElementById('ajout-container');

      let currentDate = null;
      let currentEmployes = [];

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        nowIndicator: true,
        locale: 'fr',
        slotMinTime: '06:45:00',
        slotMaxTime: '22:00:00',
        selectable: true,
        slotLabelFormat: { hour: '2-digit', minute: '2-digit', hour12: false },
        eventTimeFormat: { hour: '2-digit', minute: '2-digit', hour12: false },

        events: function (info, successCallback, failureCallback) {
          const groupeId = selectGroupe.value;
          fetch('/planning/events?groupe=' + groupeId)
            .then(response => response.json())
            .then(successCallback)
            .catch(failureCallback);
        },

        select: function (info) {
          const groupeId = selectGroupe.value;
          if (!groupeId) return;

          currentDate = info.startStr.split('T')[0];

          fetch('/planning/available', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
              start: info.startStr,
              end: info.endStr,
              groupe: groupeId
            })
          })
          .then(res => res.json())
          .then(employes => {
            currentEmployes = employes;
            if (employes.length === 0) {
              alert(\"Aucun employé disponible.\");
              return;
            }

            selectEmploye.innerHTML = \"\";
            employes.forEach(e => {
              const opt = document.createElement('option');
              opt.value = e.id;
              opt.text = `\${e.prenom} \${e.nom}`;
              selectEmploye.appendChild(opt);
            });

            ajoutContainer.style.display = \"block\";
          });
        },

        eventClick: function (info) {
          if (confirm(\"Supprimer ce créneau ?\")) {
            fetch('/planning/delete', {
              method: 'POST',
              headers: { 'Content-Type': 'application/json' },
              body: JSON.stringify({ id: info.event.id })
            }).then(() => info.event.remove());
          }
        },

        eventDrop: function (info) {
          updateEvent(info.event);
        },

        eventResize: function (info) {
          updateEvent(info.event);
        }
      });

      calendar.render();

      selectGroupe.addEventListener('change', () => calendar.refetchEvents());

      generateButton.addEventListener('click', function () {
        generateButton.disabled = true;
        generateButton.innerText = \"⏳ Génération...\";

        fetch('/planning/setup')
          .then(() => {
            generateButton.disabled = false;
            generateButton.innerText = \"✅ Planning généré\";
            calendar.refetchEvents();
            setTimeout(() => generateButton.innerText = \"🔄 Générer planning auto\", 2000);
          })
          .catch(() => {
            alert(\"Erreur de génération.\");
            generateButton.disabled = false;
            generateButton.innerText = \"🔄 Générer planning auto\";
          });
      });

      btnAjouter.addEventListener('click', function () {
        const selectedId = selectEmploye.value;
        const selected = currentEmployes.find(e => e.id == selectedId);
        const groupeId = selectGroupe.value;
        const start = inputDebut.value;
        const end = inputFin.value;

        if (!start || !end) {
          alert(\"Veuillez indiquer une heure de début et de fin.\");
          return;
        }

        fetch('/planning/add-ajax', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            nom: selected.nom,
            prenom: selected.prenom,
            date: currentDate,
            start: start,
            end: end,
            groupe: groupeId
          })
        }).then(res => res.json()).then(data => {
          if (data.success) {
            calendar.refetchEvents();
            calendar.gotoDate(currentDate);
            ajoutContainer.style.display = \"none\";
          } else {
            alert(data.message || \"Erreur lors de l’ajout.\");
          }
        });
      });

      function updateEvent(event) {
        fetch('/planning/update', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({
            id: event.id,
            start: event.start.toISOString(),
            end: event.end.toISOString()
          })
        })
        .then(res => res.json())
        .then(data => {
          if (data.status !== 'ok') {
            alert(\"Erreur de mise à jour.\");
            calendar.refetchEvents();
          }
        });
      }
    });
  </script>
{% endblock %}
", "planning/calendar.html.twig", "C:\\wamp64\\www\\planningApp\\templates\\planning\\calendar.html.twig");
    }
}
