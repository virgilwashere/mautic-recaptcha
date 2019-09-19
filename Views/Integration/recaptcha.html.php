<?php
/*
 * @copyright   2019 Mautic Contributors. All rights reserved
 *
 * @author      Konstantin Scheumann
 * @author      Virgil
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

include __DIR__.'/../../../../app/bundles/FormBundle/Views/Field/field_helper.php';

$containerType     = 'div-wrapper';
$defaultInputClass = (isset($inputClass)) ? $inputClass : 'input';

$action   = $app->getRequest()->get('objectAction');
$settings = $field['properties'];

// $formName       = !empty($formName) ? $formName : '';
$formName       = str_replace('_', '', $formName);
$hashedFormName = md5($formName);
$formButtons    = (!empty($inForm)) ? $view->render(
    'MauticFormBundle:Builder:actions.html.php',
    [
        'deleted'        => false,
        'id'             => $id,
        'formId'         => $formId,
        'formName'       => $formName,
        'disallowDelete' => false,
    ]
) : '';

$label = (!$field['showLabel'])
    ? ''
    : <<<HTML
<label $labelAttr>{$view->escape($field['label'])}</label>
HTML;

$jsCallback = <<<GRECAPTCHA_CALLBACK
    <script type="text/javascript">
        var verifyCallback_{$hashedFormName}( response ) {
            document.getElementById("mauticform_input_{$formName}_{$field['alias']}").value = response;
        };
        var expCallback = function() {
            grecaptcha.reset();
        };
        var onloadCallback = function() {
            grecaptcha.render("mauticform_{$formName}_{$field['alias']}", {
                'sitekey' : "{$field['customParameters']['site_key']}",
                'callback' : verifyCallback_{$hashedFormName},
                'expired-callback': expCallback,
                'theme' : 'dark',
                // 'size' : 'compact',
            });
        };
    </script>
GRECAPTCHA_CALLBACK;

$jsAPI = <<<RECAPTCHA_API
    <!-- Explicitly render the reCAPTCHA widget -->
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
RECAPTCHA_API;

$html = <<<HTML
    {$jsCallback}
    <div $containerAttr>
        {$label}
        <!-- <div class="g-recaptcha" data-sitekey="{$field['customParameters']['site_key']}" data-callback="verifyCallback_{$hashedFormName}" data-expired-callback="expCallback"></div> -->
        <div class="g-recaptcha"></div>
        <input $inputAttr type="hidden">
        <span class="mauticform-errormsg" style="display: none;"></span>
    </div>
    {$jsAPI}
HTML;
?>

<?php
echo $html;
?>

