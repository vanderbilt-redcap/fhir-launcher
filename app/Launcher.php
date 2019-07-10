<?php
namespace REDCap\FhirLauncher\App;

class Launcher {

    function __construct()
    {
        echo "launcher";
    }

    public function getConformanceUrls()
    {
        global $fhir_endpoint_base_url, $fhir_endpoint_token_url, $fhir_endpoint_authorize_url;
        $conformance_URL = sprintf("%s/metadata", $fhir_endpoint_base_url);

        $http_options = array(
            /* 'headers' => array(
                'Accept' => 'application/json',
                'Content-type' => 'application/x-www-form-urlencoded',
            ),
            'data' => array(
                'code' => $code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => $redirectUrl
            ), */
            'options' => array('timeout'=>30)
        );
        $response = \HttpClient::request($method='GET', $conformance_URL, $http_options);
        $xml_string = $response->body;
        $conformanceXML = new \SimpleXMLElement($xml_string);
        $security_extensions = $conformanceXML->rest->security->extension->extension;
        $urls = array();
        foreach ($security_extensions as $extension) {
            $type = (string)$extension['url'];
            // var_dump($key, $extension);
            $url = (string)$extension->valueUri['value'];
            $urls[$type] = $url;
            # code...
        }
        // var_dump($security_extensions);
        return $urls;
    }

    public function authorize($auth_url)
    {
        global $fhir_endpoint_base_url,
                $fhir_client_id,
                $redcap_base_url;
        // add slash at the end if missing
        $base_url = preg_replace('/(.+[^\/]$)/', '$1/', $redcap_base_url);
        $redirect_URL = $redcap_base_url.'ehr.php';
        $data = array(
            'scope' => 'launch/patient',
            'response_type' => 'code',
            'state' => '1234567890',
            'redirect_uri' => 'https://redcaptest.vanderbilt.edu/ehr.php', //$redirect_URL,
            'aud' => $fhir_endpoint_base_url,
            'client_id' => $fhir_client_id,
        );
        $query = http_build_query($data);
        $url = sprintf("%s?%s", $auth_url, $query);
        \HttpClient::redirect($url);
    }

}