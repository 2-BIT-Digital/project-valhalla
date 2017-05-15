<?php

/* 503 */
class __TwigTemplate_bcdd96b2945e11727faacabbfb63ced417aebe3204286c7fcb43f2b48732a9d4 extends Craft\BaseTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("_layouts/message", "503", 1);
        $this->blocks = array(
            'message' => array($this, 'block_message'),
            '__internal_be4cfa466a562d36cf8c964d1d1423b329363da51a34ec280bc7bb3bb46c956b' => array($this, 'block___internal_be4cfa466a562d36cf8c964d1d1423b329363da51a34ec280bc7bb3bb46c956b'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "_layouts/message";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["title"] = \Craft\Craft::t("Service Unavailable");
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_message($context, array $blocks = array())
    {
        // line 5
        echo "\t<h2>";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h2>

    ";
        // line 7
        if (($context["message"] ?? null)) {
            // line 8
            echo "\t\t";
            echo twig_escape_filter($this->env, $this->env->getExtension('Craft\CraftTwigExtension')->markdownFilter(            $this->renderBlock("__internal_be4cfa466a562d36cf8c964d1d1423b329363da51a34ec280bc7bb3bb46c956b", $context, $blocks)), "html", null, true);
            // line 9
            echo "\t";
        } else {
            // line 10
            echo "\t\t<p>";
            echo twig_escape_filter($this->env, \Craft\Craft::t("Our site is temporarily unavailable. Please try again later."), "html", null, true);
            echo "</p>
\t";
        }
    }

    // line 8
    public function block___internal_be4cfa466a562d36cf8c964d1d1423b329363da51a34ec280bc7bb3bb46c956b($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "503";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  49 => 10,  46 => 9,  43 => 8,  41 => 7,  35 => 5,  32 => 4,  28 => 1,  26 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "503", "");
    }
}
