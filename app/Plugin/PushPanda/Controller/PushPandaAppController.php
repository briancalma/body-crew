<?php

App::uses('AppController', 'Controller');

class PushPandaAppController extends AppController 
{
    
    public $components = ['PushManager.Push','Flash'];
    public $helpers = ['Form','Html'];
    
}
