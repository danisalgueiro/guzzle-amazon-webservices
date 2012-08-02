<?php

namespace GuzzleAmazonWebservices\Signature;

/**
 * AWS Signature version 2
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
class SignatureV2 extends AbstractSignature
{
    /**
     * {@inheritdoc}
     */
    protected $phpAlgorithm = 'sha256';
    
    /**
     * {@inheritdoc}
     */
    protected $hashAlgorithm = 'HmacSHA256';
    
    /**
     * {@inheritdoc}
     */
    protected $version = '2';

    /**
     * {@inheritdoc}
     */
    public function composeRequestToSign(array $request, array $options = null)
    {
        if (is_null($options) || !isset($options['endpoint'])) {
            return '';
        }

        $options = $this->assignDefaultOptions($options);
        $serviceEndpoint = parse_url($options['endpoint']);
        
        uksort($request, $options['sort_method']);
        
        $parameterString = $this->buildParameterString($request, $options['ignore']);
        
        return $options['method'] . "\n"
            . $serviceEndpoint['host'] . "\n"
            . (isset($serviceEndpoint['path']) ? $serviceEndpoint['path'] : '/') . "\n"
            . $parameterString;
    }
    
    /**
     * Return the request options array with default values
     * 
     * @param array $options Request options
     * 
     * @return array Options with default values
     */
    protected function assignDefaultOptions(array $options)
    {
        if (!array_key_exists('ignore', $options)) {
            $options['ignore'] = array('awsSignature', 'Signature');
        } else {
            $options['ignore'] = (array) $options['ignore'];
        }

        if (!array_key_exists('sort_method', $options)) {
            $options['sort_method'] = 'strcmp';
        }

        if (!array_key_exists('method', $options)) {
            $options['method'] = 'GET';
        }
        
        return $options;
    }
    
    /**
     * Create the string with all parameters of the request
     * 
     * @param array $request The request to sign
     * @param array $ignore Array with parameters to ignore
     * 
     * @return string Request parameters in string format to be signed
     */
    protected function buildParameterString(array $request, array $ignore)
    {
        $parameterString = '';
        foreach ($request as $k => $v) {
            if ($k && $v && !in_array($k, $ignore)) {
                if ($parameterString) {
                    $parameterString .= '&';
                }
                $parameterString .= rawurlencode($k) . '=' . rawurlencode($v);
            }
        }
        
        return $parameterString;
    }
}
