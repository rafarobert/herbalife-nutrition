export XDEBUG_CONFIG="idekey=123"
export XDEBUG_CONFIG="remote_enable=1 remote_mode=req remote_port=9000 remote_host=127.0.0.1 remote_connect_back=0"
export QUERY_STRING="start_debug=1&debug_host=127.0.0.1&no_remote=1&debug_port=10137&debug_stop=1&email=rafael@estic.com.bo&password=123"

php -B "\$_REQUEST = array('email' => 'rafael@estic.com.bo', 'password' => '123');" -F index.php sys/migrate/fromdatabase
echo -e "\012"

