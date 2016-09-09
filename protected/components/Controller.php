<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
    {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public function printLogs($log = 'empty logs', $data)
        {
        if ($this->restrictUrl()) Yii::log(CVarDumper::DumpAsString($log), CLogger::LEVEL_WARNING, $data);
        }

    public function restrictUrl()
        {
        $controller = Yii::app()->controller->id;
        $action = Yii::app()->controller->action->id;
        if ($action == 'deleteAssets' || $action == 'showLogs')
            {
            return false;
            }
        return true;
        }

    public function sendJSONResponse($arr, $code = 200)
        {
        header('Content-type: application/json');

        $this->printLogs($arr, '<h2 style = "color:Green;"><b>Reponse</b></h2>');
        echo json_encode($arr);
        Yii::app()->end();
        }

    public $breadcrumbs = array();
    public $actions = array();
    public $menu_top = array();
    public $menu_left = array();
    private $_pageCaption = 'Project Yii';
    private $_pageDescription = "In this you can easily take any service regarding your home work.";
    private $_pageKeywords = "job,Project Yii worker,employer,";

    /**
     * @return string the page heading (or caption). Defaults to the controller name and the action name,
     * without the application name.
     */
    public function getPageCaption()
        {
        if ($this->_pageCaption !== null) return $this->_pageCaption;
        else
            {
            $name = ucfirst(basename($this->getId()));
            if ($this->getAction() !== null && strcasecmp($this->getAction()->getId(), $this->defaultAction)) return $this->_pageCaption = $name . ' ' . ucfirst($this->getAction()->getId());
            else return $this->_pageCaption = $name;
            }
        }

    /**
     * @param string $value the page heading (or caption)
     */
    public function setPageCaption($value)
        {
        $this->_pageCaption = $value;
        }

    /**
     * @return string the page description (or subtitle). Defaults to the page title + 'page' suffix.
     */
    public function getPageDescription()
        {
        if ($this->_pageDescription !== null) return $this->_pageDescription;
        else
            {
            return Yii::app()->name . ' ' . $this->getPageCaption();
            }
        }

    /**
     * @param string $value the page description (or subtitle)
     */
    public function setPageDescription($value)
        {
        if (!empty($value)) $this->_pageDescription = $value;
        }

    /**
     * @param string $value the page description (or subtitle)
     */
    public function setPageKeywords($value)
        {
        if (!empty($value)) $this->_pageKeywords = $value . ', ' . $this->_pageKeywords;
        }

    public function getPageKeywords()
        {
        if ($this->_pageKeywords !== null)
            {
            $list = explode(',', $this->_pageKeywords);
            array_map('trim', $list);
            array_unique($list);
            $this->_pageKeywords = implode(',', $list);
            return $this->_pageKeywords;
            }
        else
            {
            return Yii::app()->name . ', ' . $this->getPageCaption();
            }
        }

    protected function processSEO($model)
        {
        if ($model && !$model->isNewRecord)
            {
            if ($model->hasAttribute('id')) $this->pageCaption = GxHtml::encode($model->label()) . ' - ' . GxHtml::encode(GxHtml::valueEx($model));
            $this->pageTitle = $this->pageCaption;
            if ($model->hasAttribute('content')) $this->pageDescription = substr(strip_tags($model->content), 0, 150);
            if ($model->hasAttribute('title')) $this->pageDescription = substr(strip_tags($model->title), 0, 150);
            }
        else
            {
            $this->pageCaption = GxHtml::encode($model->label() . ' - ' . $this->action->id);
            $this->pageTitle = $this->pageCaption;
            $this->pageDescription = $this->_pageDescription;
            $this->pageKeywords = $this->_pageKeywords;
            }
        }

    public function init()
        {
        parent::init();
        }

    public function AddAnalytics()
        {
            {
            ?>

            <!--  Add Analytics here  -->


            <?php
            }
        }

    protected function beforeAction($event)
        {
        if (Yii::app()->user->isAdmin)
            {

            $this->layout = '//layouts/admin_layout';
            }
        else
            {
            $this->layout = '//layouts/column1';
            }
        $arr = array();
        $arr['action'] = $event->getController()->getid();
        $arr['controller'] = $event->getid();
        $arr['post'] = $_POST;
        $arr['get'] = $_GET;

        $this->printLogs($arr, '<h2 style = "color:red;"><b>Request</b></h2>');
        return parent::beforeAction($event);
        }

    function addLog($string, $user = null)
        {
        if ($user == null) $user = Yii::app()->user->model;
        $message = $string . ' ' . $this->id . ' / ' . $this->action->id . ' by ' . $user->first_name;
        Yii::log($message, CLogger::LEVEL_WARNING, 'app');
        }

    }
