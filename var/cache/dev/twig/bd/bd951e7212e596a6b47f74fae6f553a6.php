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

/* base.html.twig */
class __TwigTemplate_c2af260a8f4bc59eb1238743abfbb0c2 extends Template
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
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html>
<head>
  <meta charset=\"UTF-8\">
  <title>";
        // line 5
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css\">
  <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.css\" rel=\"stylesheet\"/>
</head>
<body>
<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">PlanningApp</a>
    <div class=\"collapse navbar-collapse\">
      <ul class=\"navbar-nav me-auto\">
        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planning_list");
        yield "\">Plannings</a></li>
        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("planning_generate", ["year" => "2025", "week" => "1"]), "html", null, true);
        yield "\">Générer</a></li>
        <li class=\"nav-item\"><a class=\"nav-link\" href=\"";
        // line 17
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("personnel_list");
        yield "\">Personnel</a></li>
      </ul>
    </div>
  </div>
</nav>
<script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js\"></script>
<div class=\"container mt-4\">
  ";
        // line 24
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 25
        yield "</div>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 5
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

        yield "Gestion Planning";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 24
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

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  128 => 24,  105 => 5,  92 => 25,  90 => 24,  80 => 17,  76 => 16,  72 => 15,  66 => 12,  56 => 5,  50 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
  <meta charset=\"UTF-8\">
  <title>{% block title %}Gestion Planning{% endblock %}</title>
  <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css\">
  <link href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.css\" rel=\"stylesheet\"/>
</head>
<body>
<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
  <div class=\"container-fluid\">
    <a class=\"navbar-brand\" href=\"{{ path('app_home') }}\">PlanningApp</a>
    <div class=\"collapse navbar-collapse\">
      <ul class=\"navbar-nav me-auto\">
        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('planning_list') }}\">Plannings</a></li>
        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('planning_generate', {'year': '2025','week':'1'}) }}\">Générer</a></li>
        <li class=\"nav-item\"><a class=\"nav-link\" href=\"{{ path('personnel_list') }}\">Personnel</a></li>
      </ul>
    </div>
  </div>
</nav>
<script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js\"></script>
<div class=\"container mt-4\">
  {% block body %}{% endblock %}
</div>
</body>
</html>", "base.html.twig", "C:\\wamp64\\www\\planningApp\\templates\\base.html.twig");
    }
}
