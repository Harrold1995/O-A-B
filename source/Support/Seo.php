<?php

namespace Source\Support;

use CoffeeCode\Optimizer\Optimizer;

/**
 * Class Seo
 *
 * @author Lucas Tortola <lucas@arterialgroup.com>
 * @package Source\Support
 */
class Seo
{
    /** @var tags */
    private $Tags;
    /** @var date */
    protected $Data;
    /**
     * @var
     */
    private $seoTags;

    /**
     * @param string|null $title
     * @param string|null $desc
     * @param string|null $url
     * @param string|null $image
     * @param bool|null $noFollow
     * @return mixed
     */
    public function getTags(?string $title = null, ?string $desc = null, ?string $url = null, ?string $image = null, ?bool $noFollow = false)
    {
        $this->Data[0] = ($title ? $title : '');
        $this->Data[1] = ($desc ? $desc : '');
        $this->Data[2] = ($url ? $url : '');
        $this->Data[3] = ($image ? $image : '');
        $this->setTags($noFollow);
        return $this->seoTags;
    }

    /**
     * @param $noFollow
     */
    private function setTags($noFollow)
    {
        $this->Tags['Title'] = $this->Data[0];
        $this->Tags['Content'] = str_limit_words(html_entity_decode($this->Data[1]), 25);
        $this->Tags['Link'] = $this->Data[2];
        $this->Tags['Image'] = $this->Data[3];

        $this->Tags = array_map('strip_tags', $this->Tags);
        $this->Tags = array_map('trim', $this->Tags);

        $this->Data = null;

        //NORMAL PAGE
        $this->seoTags = '<title>' . $this->Tags['Title'] . '</title> ' . "\n";
        $this->seoTags .= '<meta name="description" content="' . $this->Tags['Content'] . '"/>' . "\n";
        $this->seoTags .= '<meta name="keywords" content="OAB GP TOOLKIT, toollkit, oab, gp"/>' . "\n";

        if ($noFollow){
            $this->seoTags .= '<meta name="robots" content="noindex, nofollow" />' . "\n";
        }else{
            $this->seoTags .= '<meta name="robots" content="index, follow"/>' . "\n";

        }

        $this->seoTags .= '<link rel="canonical" href="' . $this->Tags['Link'] . '">' . "\n";
        $this->seoTags .= "\n";

        //FACEBOOK
        $this->seoTags .= '<meta property="og:site_name" content="' . CONF_SITE_NAME . '" />' . "\n";
        $this->seoTags .= '<meta property="og:locale" content="en_GB" />' . "\n";
        $this->seoTags .= '<meta property="og:title" content="' . $this->Tags['Title'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:description" content="' . $this->Tags['Content'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:image" content="' . $this->Tags['Image'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:url" content="' . $this->Tags['Link'] . '" />' . "\n";
        $this->seoTags .= '<meta property="og:type" content="article" />' . "\n";
        $this->seoTags .= "\n";

        $this->seoTags .= '<meta name="twitter:title" content="' . $this->Tags['Title'] . '">' . "\n";
        $this->seoTags .= '<meta name="twitter:description" content="' . $this->Tags['Content'] . '">' . "\n";
        $this->seoTags .= '<meta name="twitter:url" content="' . $this->Tags['Link'] . '">' . "\n";
        $this->seoTags .= '<meta name="twitter:image" content="' . $this->Tags['Image'] . '">' . "\n";
        $this->seoTags .= '<meta name="twitter:card" content="summary">' . "\n";
        $this->seoTags .= '<meta name="twitter:title" content="' . $this->Tags['Title'] . '">' . "\n";
        $this->seoTags .= "\n";

        //ITEM GROUP (TWITTER)
        $this->seoTags .= '<meta itemprop="name" content="' . $this->Tags['Title'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="description" content="' . $this->Tags['Content'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="url" content="' . $this->Tags['Link'] . '">' . "\n";
        $this->seoTags .= '<meta itemprop="image" content="' . $this->Tags['Image'] . '">' . "\n";

        $this->seoTags.= '<script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "Organization",
          "name": "'.$this->Tags['Title'].'",
          "url": "'.$this->Tags['Link'].'",
          "logo": "'.$this->Tags['Image'].'",
          "contactPoint": [
            {
              "@type": "ContactPoint",
              "telephone": "",
              "email": "digital@arterialgroup.com",
              "contactType": "customer service",
              "areaServed": "AU",
              "availableLanguage": "en"
            }
          ]
          
        }
        </script>'. "\n";

    }




}