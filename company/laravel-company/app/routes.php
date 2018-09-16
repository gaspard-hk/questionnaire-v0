<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
Route::get('/hello', function()
{
	return View::make('hello');
});
* 
 */
/*
Route::get('/', function()
{
	return View::make('index');
});
*/

Route::get('/', array(
    'as' => 'showIndex',
    'uses' => 'HomeController@showIndex'
    )
);
 
Route::get('/account/signin', array(
        'as' => 'account-signin',
        'uses' => 'AccountController@getSignin'
    )    
);

Route::post('/account/signin-post', array(
        'as' => 'account-signin-post',
        'uses' => 'AccountController@postSignin'
    )    
);

Route::get('/account/create-nouser', array(
        'as' => 'account-create-nouser',
        'uses' => 'AccountController@getCreateNoUser'
    )    
);

Route::post('/account/create-nouser-post', array(
        'as' => 'account-create-nouser-post',
        'uses' => 'AccountController@postCreateNoUser'
    )    
);

Route::get('/account/create', array(
        'as' => 'account-create',
        'uses' => 'AccountController@getCreate'
    )    
);

Route::post('/account/create-post', array(
        'as' => 'account-create-post',
        'uses' => 'AccountController@postCreate'
    )    
);

Route::get('/getIP', array(
        'as' => 'IPFilter-getIP',
        'uses' => 'IPController@getIP'
    )    
);
/*
Route::get('/test', array(
        'as' => 'test',
        'uses' => 'TestController@test'
    )    
);

Route::post('/test', array(
        'as' => 'test',
        'uses' => 'TestController@test'
    )    
);

Route::get('/test2', array(
        'as' => 'test2',
        'uses' => 'TestController@test2'
    )    
);

Route::get('/test3', array(
    'as' => 'test3',
    'uses' => 'TestController@test3'
));

Route::get('/test4', array(
    'as' => 'test4',
    'uses' => 'TestController@test4'
));
*/
Route::get('/questionnaire', array(
        'as' => 'questionnaire',
        'uses' => 'QuestionnaireController@getQuestionnaire'
    )    
);
/* Questionnaire */
Route::get('/questionnaire/q1', array(
            'as' => 'questionnaire-q1',
            'uses' => 'QuestionnaireController@getQ1'
        )    
    );

Route::get('/questionnaire/q1-post', array(
        'as' => 'questionnaire-q1-post-redirect',
        'uses' => 'QuestionnaireController@getQ1'
    )    
);

Route::post('/questionnaire/q1-post', array(
        'as' => 'questionnaire-q1-post',
        'uses' => 'QuestionnaireController@postQ1'
    )    
);

Route::post('/questionnaire/q2all-post', array(
    'as' => 'questionnaire-q2all-post',
    'uses' => 'QuestionnaireController@postQ2'
)
    );


Route::post('/questionnaire/q2-post/membernocheck', array(       
        'as' => 'questionnaire-q2-membernocheck-ajax-post',
        'uses' => 'QuestionnaireController@postQ2MemberNoCheckAjax'
    )    
);     

Route::post('/questionnaire/q2-post/customertelcheck', array(       
        'as' => 'questionnaire-q2-customertelcheck-ajax-post',
        'uses' => 'QuestionnaireController@postQ2CustomerTelCheckAjax'
    )    
);



Route::post('/questionnaire/q2same-post', array(
        'as' => 'questionnaire-q2same-post',
        'uses' => 'QuestionnaireController@postQ2same'
    )    
);

Route::post('/questionnaire/q2different-post', array(
        'as' => 'questionnaire-q2different-post',
        'uses' => 'QuestionnaireController@postQ2different'
    )    
);

Route::post('/questionnaire/q2single-post', array(
        'as' => 'questionnaire-q2single-post',
        'uses' => 'QuestionnaireController@postQ2single'
    )    
);

Route::get('/questionnaire/q2-post', array(
        'as' => 'questionnaire-q2-post-redirect',
        'uses' => 'QuestionnaireController@getQ1'
    )    
);

Route::group(array('before' => 'auth'), function(){
        Route::get('/admin',array(
            'as' => 'admin',
            'uses' => 'AdminController@getAdmin'
        ));
    
        Route::get('/account/list', array(
            'as' => 'account-list',
            'uses' => 'AccountController@getList'
        ));
    
        Route::get('/account/signout',array(
            'as' => 'account-signout',
            'uses' => 'AccountController@getSignOut'
        ));
                
        Route::get('/account/edit', array(
            'as' => 'account-edit',
            'uses' => 'AccountController@getEdit'
        ));
                
        Route::post('/account/edit', array(
            'as' => 'account-edit-post',
            'uses' => 'AccountController@postEdit'
        ));
        
        Route::post('/account/modify', array(
            'as' => 'account-modify-post',
            'uses' => 'AccountController@postModify'
        ));
        
        Route::post('/account/delete', array(
            'as' => 'account-delete-post',
            'uses' => 'AccountController@postDelete'
        ));
    

        Route::get('/admin/shops/list',array(
            'as' => 'shops-list',
            'uses' => 'ShopController@getList'
        ));
        
        Route::post('/admin/shops/create',array(
            'as' => 'shops-create-post',
            'uses' => 'ShopController@postCreate'
        ));
                
        Route::post('/admin/shops/delete',array(
            'as' => 'shops-delete-post',
            'uses' => 'ShopController@postDelete'
        ));

        Route::post('/admin/shops/position/up',array(
            'as' => 'shops-position-up-post',
            'uses' => 'ShopController@postUp'
        ));
        
        Route::post('/admin/shops/position/down',array(
            'as' => 'shops-position-down-post',
            'uses' => 'ShopController@postDown'
        ));
        
        
        Route::get('/admin/staff/list',array(
            'as' => 'staff-list',
            'uses' => 'StaffController@getList'
        ));
        
        Route::post('/admin/staff/import',array(
            'as' => 'staff-import-post',
            'uses' => 'StaffController@postImport'
        ));

        Route::get('/admin/member/list',array(
            'as' => 'member-list',
            'uses' => 'MemberController@getList'
        ));

        Route::post('/admin/member/reset',array(
            'as' => 'member-reset-post',
            'uses' => 'MemberController@postReset'
        ));
        
        Route::post('/admin/member/deleteemptyrow',array(
            'as' => 'member-deleteemptyrow-post',
            'uses' => 'MemberController@postDeleteEmptyRow'
        ));
        
        Route::post('/admin/member/datatable',array(
            'as' => 'member-datatable-post',
            'uses' => 'MemberController@postDatatable'
        ));
        
        Route::post('/admin/member/import',array(
            'as' => 'member-import-post',
            'uses' => 'MemberController@postImport'
        ));
        
        Route::get('/admin/online/list',array(
            'as' => 'online-list',
            'uses' => 'OnlineController@getList'
        ));
        
        Route::post('/admin/online/datatable',array(
            'as' => 'online-datatable-post',
            'uses' => 'OnlineController@postDatatable'
        ));
        
        Route::get('/admin/online/edit',array(
            'as' => 'online-edit',
            'uses' => 'OnlineController@getEdit'
        ));
        
        Route::post('/admin/online/modify',array(
            'as' => 'online-modify-post',
            'uses' => 'OnlineController@postModify'
        ));
        
        Route::post('/admin/online/delete',array(
            'as' => 'online-delete-post',
            'uses' => 'OnlineController@postDelete'
        ));
        
        Route::get('/admin/statistic/export',array(
            'as' => 'statistic-export',
            'uses' => 'StatisticController@getExport'
        ));
        
        Route::post('/admin/statistic/export1',array(
            'as' => 'statistic-export-report1-post',
            'uses' => 'StatisticController@postExportReport1'
        ));
        
        Route::post('/admin/statistic/export2',array(
            'as' => 'statistic-export-report2-post',
            'uses' => 'StatisticController@postExportReport2'
        ));
                
        Route::post('/admin/statistic/export3a',array(
            'as' => 'statistic-export-report3a-post',
            'uses' => 'StatisticController@postExportReport3a'
        ));
        
        Route::post('/admin/statistic/export3b',array(
            'as' => 'statistic-export-report3b-post',
            'uses' => 'StatisticController@postExportReport3b'
        ));
        
        Route::post('/admin/statistic/export3c',array(
            'as' => 'statistic-export-report3c-post',
            'uses' => 'StatisticController@postExportReport3c'
        ));

                        
        Route::post('/admin/statistic/export4',array(
            'as' => 'statistic-export-report4-post',
            'uses' => 'StatisticController@postExportReport4'
        ));
        
        Route::post('/admin/statistic/delete',array(
            'as' => 'statistic-delete-post',
            'uses' => 'StatisticController@postDelete'
        ));
        
        Route::get('/admin/ipfilter/list',array(
            'as' => 'ipfilter-list',
            'uses' => 'IPController@getlist'
        ));
        
        Route::post('/admin/ipfilter/set',array(
            'as' => 'ipfilter-set-post',
            'uses' => 'IPController@postSet'
        ));
        
        Route::post('/admin/ipfilter/create',array(
            'as' => 'ipfilter-create-post',
            'uses' => 'IPController@postCreate'
        ));
        
        Route::post('/admin/ipfilter/delete',array(
            'as' => 'ipfilter-delete-post',
            'uses' => 'IPController@postDelete'
        ));
        
        Route::get('/admin/audittrail/list',array(
            'as' => 'audittrail-list',
            'uses' => 'AudittrailController@getList'
        ));
        
        Route::post('/admin/audittrail/delete',array(
            'as' => 'audittrail-delete-post',
            'uses' => 'AudittrailController@postdelete'
        ));
        
        Route::post('/admin/audittrail/datatable',array(
            'as' => 'audittrail-datatable-post',
            'uses' => 'AudittrailController@postDatatable'
        ));
    }
);


