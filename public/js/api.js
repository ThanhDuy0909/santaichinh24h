var token       = sessionStorage.getItem('token') || null;

var id_token    = sessionStorage.getItem('id_token') || null;

var name        = sessionStorage.getItem('name') || null;

var is_author   = sessionStorage.getItem('is_author') || null;

var is_role     = sessionStorage.getItem('is_role') || null;

var _token      = $('meta[name="csrf-token"]').attr('content');

var area        = [];

var catelog     = [];
//sessionStorage.setItem('namesession',pramee);
$.ajaxSetup({
    headers:
        { 'X-CSRF-TOKEN': _token}
});
if (token != null) {
    $.ajaxSetup({
        headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*',
            'X-Requested-With': 'XMLHttpRequest',
            Authorization : 'Bearer '+ token,
        }
    });
}
var linkCic     = 'http://api.checkcic.net/API';

var linkUser    = "http://127.0.0.1:8000/";

var linkCpanel  = "http://127.0.0.1:8000/cpanel/";

var linkApi     = "http://127.0.0.1:8000/api/cpanel/";

var route   = {
    login                   : 'login',
    profile                 : 'profile',
    logout                  : 'logout',
    area                    : 'area',
    findArea                : 'area/findArea',
    areaAdd                 : 'area/areaAdd',
    areaUpdate              : 'area/areaUpdate',
    changeStatusProvince    : 'area/changeStatusProvince',
    changeStatusRegion      : 'area/changeStatusRegion',
    deleteProvince          : 'area/deleteProvince',
    deleteRegion            : 'area/deleteRegion',
    catelog                 : 'catelog',
    findcatelog             : 'catelog/findcatelog',
    catelogAdd              : 'catelog/catelogAdd',
    catelogUpdate           : 'catelog/catelogUpdate',
    changeStatusCatelog     : 'catelog/changeStatusCatelog',
    deleteCatelog           : 'catelog/deleteCatelog',
    changeStatusFinance     : 'finance/changeStatusFinance',
    deleteFinance           : 'finance/deleteFinance',
    addfinance              : 'finance/addfinance',
    findfinance             : 'finance/findfinance',
    financeUpdate           : 'finance/financeUpdate',
    user                    : 'user',
    findUser                : 'user/findUser',
    addUser                 : 'user/addUser',
    updateUser              : 'user/updateUser',
    deleteUser              : 'user/deleteUser',
    checknameUser           : 'user/checknameUser',
    checkemailUser          : 'user/checkemailUser',
    checkphoneUser          : 'user/checkphoneUser',
    changeStatusUser        : 'user/changeStatusUser',
    addNews                 : 'news/addNews',
    findnews                : 'news/findnews',
    newsUpdate              : 'news/newsUpdate',
    changeStatusNews        : 'news/changeStatusNews',
    deleteNews              : 'news/deleteNews',
    job                     : 'recruit/job',
    addRecruit              : 'recruit/addRecruit',
    findRecruit             : 'recruit/findRecruit',
    updateRecruit           : 'recruit/updateRecruit',
    changeStatusRecruit     : 'recruit/changeStatusRecruit',
    deleteRecruit           : 'recruit/deleteRecruit',

    candidates              : 'candidates',
    findCandidates          : 'candidates/findCandidates',
    addCandidates           : 'candidates/addCandidates',
    updateCandidates        : 'candidates/updateCandidates',
    changeStatusCandidates  : 'candidates/changeStatusCandidates',
    deleteCandidates        : 'candidates/deleteCandidates',
}