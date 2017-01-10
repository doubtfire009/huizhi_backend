<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\common;

use ReflectionClass;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

class ServiceContainer extends yii\di\Container
{
    /*
    * 1.不用传参数的类，使用：
     * $service_container->set('foo', 'app\service\TestTmp');
     * $service_container->get('foo')->test3(3,2);
     * 2.需要传参数的类，使用：
     * $service_container->set('fooo', [
            'class' => 'app\service\TestTmp',
            'con_a'=>8,
            'con_b'=>9
        ]);
     * $service_container->get('fooo')->test4(3,2);
     */
    /**
     * @var array singleton objects indexed by their types
     */
    public $_service_versions;
    public function __construct() {
        $this->_service_versions = Yii::$app->params['service_verion'];
    }
    public function test(){
        $service_versions = $this->_service_versions;

        echo $service_versions;
    }
    
    public function normalizeDefinition($class, $definition){
        if (empty($definition)) {
            $ver_id = service_version_locator($class,$this->_service_versions);
            $class = service_container_dir_version_class($class,$ver_id);
            return ['class' => $class];
        } elseif (is_string($definition)) {
            $ver_id = service_version_locator($definition,$this->_service_versions);
            $definition = service_container_dir_version_class($definition,$ver_id);
            return ['class' => $definition];
        } elseif (is_callable($definition, true) || is_object($definition)) {
            //ServiceContainer不接受匿名函数做参数，因为返回值不能插入version
            throw new InvalidConfigException("ServiceContainer doesn't support \"Closure\" function.");
        } elseif (is_array($definition)) {
            if (!isset($definition['class'])) {
                if (strpos($class, '\\') !== false) {
                    $ver_id = service_version_locator($class,$this->_service_versions);
                    $class = service_container_dir_version_class($class,$ver_id);
                    $definition['class'] = $class;
                } else {
                    throw new InvalidConfigException("A class definition requires a \"class\" member.");
                }
            }else{
                $ver_id = service_version_locator($definition['class'],$this->_service_versions);
                $definition['class'] = service_container_dir_version_class($definition['class'],$ver_id);
            }
            return $definition;
        } else {
            throw new InvalidConfigException("Unsupported definition type for \"$class\": " . gettype($definition));
        }
    }
}
