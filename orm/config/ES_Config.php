<?php
/**
 * Created by Estic.
 * User: rafaelgutierrez
 * Date: 22/05/2019
 * Time: 8:19 pm
 */

use \Propel\Runtime\ActiveQuery\Criteria as Criteria;

trait ES_Config_Trait
{
  
  public function configProyName()
  {
    return config_item('proy_name');
  }
  
  public function configIndexPage()
  {
    return config_item('index_page');
  }
  
  public function configUriProtocol()
  {
    return config_item('uri_protocol');
  }
  
  public function configUrlSuffix()
  {
    return config_item('url_suffix');
  }
  
  public function configLanguage()
  {
    return config_item('language');
  }
  
  public function configCharset()
  {
    return config_item('charset');
  }
  
  public function configEnableHooks()
  {
    return config_item('enable_hooks');
  }
  
  public function configSubclassPrefix()
  {
    return config_item('subclass_prefix');
  }
  
  public function configComposerAutoload()
  {
    return config_item('composer_autoload');
  }
  
  public function configPermittedUriChars()
  {
    return config_item('permitted_uri_chars');
  }
  
  public function configAllowGetArray()
  {
    return config_item('allow_get_array');
  }
  
  public function configEnableQueryStrings()
  {
    return config_item('enable_query_strings');
  }
  
  public function configControllerTrigger()
  {
    return config_item('controller_trigger');
  }
  
  public function configFunctionTrigger()
  {
    return config_item('function_trigger');
  }
  
  public function configDirectoryTrigger()
  {
    return config_item('directory_trigger');
  }
  
  public function configLogThreshold()
  {
    return config_item('log_threshold');
  }
  
  public function configLogPath()
  {
    return config_item('log_path');
  }
  
  public function configLogFileExtension()
  {
    return config_item('log_file_extension');
  }
  
  public function configLogFilePermissions()
  {
    return config_item('log_file_permissions');
  }
  
  public function configLogDateFormat()
  {
    return config_item('log_date_format');
  }
  
  public function configErrorViewsPath()
  {
    return config_item('error_views_path');
  }
  
  public function configCachePath()
  {
    return config_item('cache_path');
  }
  
  public function configCacheQueryString()
  {
    return config_item('cache_query_string');
  }
  
  public function configEncryptionKey()
  {
    return config_item('encryption_key');
  }
  
  public function configSessDriver()
  {
    return config_item('sess_driver');
  }
  
  public function configSessCookieName()
  {
    return config_item('sess_cookie_name');
  }
  
  public function configSessExpiration()
  {
    return config_item('sess_expiration');
  }
  
  public function configSessSavePath()
  {
    return config_item('sess_save_path');
  }
  
  public function configSessMatchIp()
  {
    return config_item('sess_match_ip');
  }
  
  public function configSessTimeToUpdate()
  {
    return config_item('sess_time_to_update');
  }
  
  public function configSessRegenerateDestroy()
  {
    return config_item('sess_regenerate_destroy');
  }
  
  public function configCookiePrefix()
  {
    return config_item('cookie_prefix');
  }
  
  public function configCookieDomain()
  {
    return config_item('cookie_domain');
  }
  
  public function configCookiePath()
  {
    return config_item('cookie_path');
  }
  
  public function configCookieSecure()
  {
    return config_item('cookie_secure');
  }
  
  public function configCookieHttponly()
  {
    return config_item('cookie_httponly');
  }
  
  public function configStandardizeNewlines()
  {
    return config_item('standardize_newlines');
  }
  
  public function configGlobalXssFiltering()
  {
    return config_item('global_xss_filtering');
  }
  
  public function configCsrfProtection()
  {
    return config_item('csrf_protection');
  }
  
  public function configCsrfTokenName()
  {
    return config_item('csrf_token_name');
  }
  
  public function configCsrfCookieName()
  {
    return config_item('csrf_cookie_name');
  }
  
  public function configCsrfExpire()
  {
    return config_item('csrf_expire');
  }
  
  public function configCsrfRegenerate()
  {
    return config_item('csrf_regenerate');
  }
  
  public function configCsrfExcludeUris()
  {
    return config_item('csrf_exclude_uris');
  }
  
  public function configCompressOutput()
  {
    return config_item('compress_output');
  }
  
  public function configTimeReference()
  {
    return config_item('time_reference');
  }
  
  public function configRewriteShortTags()
  {
    return config_item('rewrite_short_tags');
  }
  
  public function configDatabase()
  {
    return config_item('database');
  }
  
  public function configProxyIps()
  {
    return config_item('proxy_ips');
  }
  
  public function configBaseUrl()
  {
    return config_item('base_url');
  }
  
  public function configIbolsastCrm()
  {
    return config_item('herbalife');
  }
  
  public function configSys()
  {
    return config_item('sys');
  }
  
  public function configSysTitle()
  {
    return config_item('sys_title');
  }
  
  public function configSysName()
  {
    return config_item('sys_name');
  }
  
  public function configSessKeyAdmin()
  {
    return config_item('sess_key_admin');
  }
  
  public function configSessKeyEstic()
  {
    return config_item('sess_key_estic');
  }
  
  public function configSessKeySys()
  {
    return config_item('sess_key_sys');
  }
  
  public function configSessKey()
  {
    return config_item('sess_key');
  }
  
  public function configSessTable()
  {
    return config_item('sess_table');
  }
  
  public function configSessIdTable()
  {
    return config_item('sess_idTable');
  }
  
  public function configSessObject()
  {
    return config_item('sess_object');
  }
  
  public function configVarExcepts()
  {
    return config_item('var_excepts');
  }
  
  public function configTabExcepts()
  {
    return config_item('tab_excepts');
  }
  
  public function configTabTitles()
  {
    return config_item('tab_titles');
  }
  
  public function configIsysDirs()
  {
    return config_item('isysDirs');
  }
  
  public function configOrmDirs()
  {
    return config_item('ormDirs');
  }
  
  public function configDirs()
  {
    return config_item('dirs');
  }
  
  public function configMigTable()
  {
    return config_item('mig_table');
  }
  
  public function configMigPath()
  {
    return config_item('mig_path');
  }
  
  public function configEnglishWords()
  {
    return config_item('english_words');
  }
  
  public function configControlFields()
  {
    return config_item('controlFields');
  }
  
  public function configFileMaxSize()
  {
    return config_item('file_max_size');
  }
  
  public function configFileTypes()
  {
    return config_item('file_types');
  }
  
  public function configFileTypesJs()
  {
    return config_item('file_types_js');
  }
  
  public function configFileWithoutTumbs()
  {
    return config_item('file_without_tumbs');
  }
  
  public function configImgMaxWidth()
  {
    return config_item('img_max_width');
  }
  
  public function configImgMaxHeight()
  {
    return config_item('img_max_height');
  }
  
  public function configSoftName()
  {
    return config_item('soft_name');
  }
  
  public function configSoftUserId()
  {
    return config_item('soft_user_id');
  }
  
  public function configSoftUser()
  {
    return config_item('soft_user');
  }
  
  public function configSoftUserName()
  {
    return config_item('soft_user_name');
  }
  
  public function configSoftUserEmail()
  {
    return config_item('soft_user_email');
  }
  
  public function configSoftUserRole()
  {
    return config_item('soft_user_role');
  }
  
  public function configAppDirs()
  {
    return config_item('appDirs');
  }
  
  public function configSiteName()
  {
    return config_item('site_name');
  }
  
  public function configSiteTitle()
  {
    return config_item('site_title');
  }
  
  public function configSiteDomain()
  {
    return config_item('site_domain');
  }
  
  public function configMetaReplyTo()
  {
    return config_item('meta_reply_to');
  }
  
  public function configMetaLanguaje()
  {
    return config_item('meta_languaje');
  }
  
  public function configMetaDescripcion()
  {
    return config_item('meta_descripcion');
  }
  
  public function configMetaKeywords()
  {
    return config_item('meta_keywords');
  }
  
  public function configMetaViewport()
  {
    return config_item('meta_viewport');
  }
  
  public function configMetaThemeColor()
  {
    return config_item('meta_theme_color');
  }
  
  public function configMetaName()
  {
    return config_item('meta_name');
  }
  
  public function configMetaImage()
  {
    return config_item('meta_image');
  }
  
  public function configMetaTitle()
  {
    return config_item('meta_title');
  }
  
  public function configFavIcon()
  {
    return config_item('fav_icon');
  }
  
}
