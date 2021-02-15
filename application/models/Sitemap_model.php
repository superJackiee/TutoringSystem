<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->urls = array();
    }


    //input values
    public function input_values()
    {
        $data = array(
            'frequency' => $this->input->post('frequency', true),
            'last_modification' => $this->input->post('last_modification', true),
            'lastmod_time' => $this->input->post('lastmod_time', true),
            'priority' => $this->input->post('priority', true),
        );
        return $data;
    }

    public function add($loc, $changefreq = NULL, $lastmod = NULL, $priority = NULL, $priority_value = NULL, $lastmod_time = NULL)
    {
        $item = new stdClass();
        $item->loc = $loc;
        $item->lastmod = $lastmod;
        $item->lastmod_time = $lastmod_time;
        $item->changefreq = $changefreq;
        $item->priority = $priority;
        $item->priority_value = $priority_value;
        $this->urls[] = $item;

        return true;
    }

    /**
     * Generate the sitemap file and replace any output with the valid XML of the sitemap
     *
     * @param string $type Type of sitemap to be generated. Use 'urlset' for a normal sitemap. Use 'sitemapindex' for a sitemap index file.
     * @access public
     * @return void
     */
    public function output($type = 'urlset')
    {

        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($this->urls as $url) {
            $child = $xml->addChild('url');
            $child->addChild('loc', strtolower($url->loc));

            if (isset($url->lastmod) && $url->lastmod != 'none') {
                if ($url->lastmod == 'server_response') {
                    $child->addChild('lastmod', date("Y-m-d H:i:s"));
                } else {
                    $child->addChild('lastmod', $url->lastmod_time);
                }
            }

            if (isset($url->changefreq) && $url->changefreq != 'none') {
                $child->addChild('changefreq', $url->changefreq);
            }

            if (isset($url->priority) && $url->priority != 'none') {
                $child->addChild('priority', $url->priority_value);
            }
        }

        header('Content-Disposition: attachment; filename="sitemap.xml"');
        $this->output->set_content_type('application/xml')->set_output($xml->saveXML());

    }

    /**
     * Clear all items in the sitemap to be generated
     *
     * @access public
     * @return boolean
     */
    public function clear()
    {
        $this->urls = array();
        return true;
    }

}
