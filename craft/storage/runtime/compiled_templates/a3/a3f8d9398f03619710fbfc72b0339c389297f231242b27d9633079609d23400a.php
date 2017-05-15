<?php

/* _layouts/base */
class __TwigTemplate_b74c92a16f99474653aad6909b24b8c0da97f59c9542d41dab9068f856a88200 extends Craft\BaseTemplate
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'body' => array($this, 'block_body'),
            'foot' => array($this, 'block_foot'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $_js = "css/craft.css";
        \Craft\craft()->templates->includecssresource($_js, true);
        // line 3
        $context["siteName"] = $this->getAttribute($this->getAttribute(($context["craft"] ?? null), "app", array()), "getSiteName", array(), "method");
        // line 4
        $context["docTitle"] = ((array_key_exists("docTitle", $context)) ? (($context["docTitle"] ?? null)) : (strip_tags(($context["title"] ?? null))));
        // line 5
        $context["bodyClass"] = (((array_key_exists("bodyClass", $context)) ? ((($context["bodyClass"] ?? null) . " ")) : ("")) . $this->getAttribute($this->getAttribute($this->getAttribute(($context["craft"] ?? null), "i18n", array()), "getLocaleData", array(), "method"), "getOrientation", array(), "method"));
        // line 7
        echo "<!DOCTYPE html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en-US\">
<head>
\t";
        // line 10
        $this->displayBlock('head', $context, $blocks);
        // line 28
        echo "</head>
<body class=\"";
        // line 29
        echo twig_escape_filter($this->env, ($context["bodyClass"] ?? null), "html", null, true);
        echo "\">
\t";
        // line 30
        $this->displayBlock('body', $context, $blocks);
        // line 31
        echo "\t";
        $this->displayBlock('foot', $context, $blocks);
        // line 32
        echo "</body>
</html>
";
    }

    // line 10
    public function block_head($context, array $blocks = array())
    {
        // line 11
        echo "\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<meta charset=\"utf-8\">
\t<title>";
        // line 13
        echo twig_escape_filter($this->env, ((($context["docTitle"] ?? null) . (((($context["docTitle"] ?? null) && ($context["siteName"] ?? null))) ? (" - ") : (""))) . ($context["siteName"] ?? null)), "html", null, true);
        echo "</title>
\t";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Craft\CraftTwigExtension')->getHeadHtmlFunction(), "html", null, true);
        echo "
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\">

\t<link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, \Craft\UrlHelper::getResourceUrl("images/touch-icons/ipad_1x.png"), "html", null, true);
        echo "\">
\t<link rel=\"apple-touch-icon\" sizes=\"120x120\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, \Craft\UrlHelper::getResourceUrl("images/touch-icons/iphone_2x.png"), "html", null, true);
        echo "\">
\t<link rel=\"apple-touch-icon\" sizes=\"152x152\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, \Craft\UrlHelper::getResourceUrl("images/touch-icons/ipad_2x.png"), "html", null, true);
        echo "\">
\t<link rel=\"apple-touch-icon\" sizes=\"167x167\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, \Craft\UrlHelper::getResourceUrl("images/touch-icons/ipad-pro_2x.png"), "html", null, true);
        echo "\">
\t<link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, \Craft\UrlHelper::getResourceUrl("images/touch-icons/iphone_3x.png"), "html", null, true);
        echo "\">

\t<script type=\"text/javascript\">
\t\t// Fix for Firefox autofocus CSS bug
\t\t// See: http://stackoverflow.com/questions/18943276/html-5-autofocus-messes-up-css-loading/18945951#18945951
\t</script>
\t";
    }

    // line 30
    public function block_body($context, array $blocks = array())
    {
    }

    // line 31
    public function block_foot($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "_layouts/base";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 31,  100 => 30,  89 => 21,  85 => 20,  81 => 19,  77 => 18,  73 => 17,  67 => 14,  63 => 13,  59 => 11,  56 => 10,  50 => 32,  47 => 31,  45 => 30,  41 => 29,  38 => 28,  36 => 10,  31 => 7,  29 => 5,  27 => 4,  25 => 3,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "_layouts/base", "");
    }
}
