 // 沙鍋料理
 let fishs = [{
    img: './img/砂鍋魚頭/沙鍋魚頭+冬粉.png',
    content: '沙鍋魚頭+冬粉',
    Description: '沙鍋魚頭+冬粉'
},
{
    img: './img/砂鍋魚頭/沙鍋魚頭+魚肉.png',
    content: '沙鍋魚頭+魚肉',
    Description: '沙鍋魚頭+魚肉'

},
{
    img: './img/砂鍋魚頭/沙鍋菜+湯餃.png',
    content: '沙鍋菜+湯餃',
    Description: '沙鍋菜+湯餃'

},
]
let fish = document.querySelector('.allfood-fishs')
fishs.forEach(function (data) {
    fish.innerHTML += `
    <div class="col-sm-4 mb-4">
        <div class="card">
    <img src="${data.img}" class="card-img-top" alt="${data.Description}">
    <div class="card-body">
    <p class="card-text">${data.content}</p>
    </div>
    </div>
    </div>
    `
})
// 阿菁健康涼菜

let vegetables = [{
    img: './img/阿菁健康涼菜/三色蛋.png',
    content: '三色蛋',
    Description: '三色蛋'
},
{
    img: './img/阿菁健康涼菜/天梯.png',
    content: '天梯',
    Description: '天梯'

},
{
    img: './img/阿菁健康涼菜/白苦瓜.png',
    content: '白苦瓜',
    Description: '白苦瓜'

},
{
    img: './img/阿菁健康涼菜/火雞肉盤.png',
    content: '火雞肉盤',
    Description: '火雞肉盤'

},
{
    img: './img/阿菁健康涼菜/沙魚燻.png',
    content: '沙魚燻',
    Description: '沙魚燻'

},
{
    img: './img/阿菁健康涼菜/青菜拼盤.png',
    content: '青菜拼盤',
    Description: '青菜拼盤'

},
{
    img: './img/阿菁健康涼菜/茄子.png',
    content: '茄子',
    Description: '茄子'

},

]
let vegetable = document.querySelector('.allfood-vegetable')
vegetables.forEach(function (data) {
    vegetable.innerHTML += `
    <div class="col-sm-4 mb-4">
        <div class="card">
    <img src="${data.img}" class="card-img-top" alt="${data.Description}">
    <div class="card-body">
    <p class="card-text">${data.content}</p>
    </div>
    </div>
    </div>
    `
})
// 米飯冬粉
let rices = [{
    img: './img/米飯冬粉/火雞肉飯.png',
    content: '火雞肉飯',
    Description: '火雞肉飯'
},
{
    img: './img/米飯冬粉/滷肉飯.png',
    content: '滷肉飯',
    Description: '滷肉飯'

},
{
    img: './img/米飯冬粉/豬心冬粉.png',
    content: '豬心冬粉',
    Description: '豬心冬粉'

},
{
    img: './img/米飯冬粉/豬舌冬粉.png',
    content: '豬舌冬粉',
    Description: '豬舌冬粉'

},
]
let rice = document.querySelector('.allfood-rice')
rices.forEach(function (data) {
    rice.innerHTML += `
    <div class="col-sm-4 mb-4">
        <div class="card">
    <img src="${data.img}" class="card-img-top" alt="${data.Description}">
    <div class="card-body">
    <p class="card-text">${data.content}</p>
    </div>
    </div>
    </div>
    `
})
// 單點品項
let items = [{
    img: './img/單點品項/太陽蛋.png',
    content: '太陽蛋',
    Description: '太陽蛋'

},
{
    img: './img/單點品項/清冬粉.png',
    content: '清冬粉',
    Description: '清冬粉'

},
]
let item = document.querySelector('.allfood-just-item')
items.forEach(function (data) {
    item.innerHTML += `
    <div class="col-sm-4 mb-4">
        <div class="card">
    <img src="${data.img}" class="card-img-top" alt="${data.Description}">
    <div class="card-body">
    <p class="card-text">${data.content}</p>
    </div>
    </div>
    </div>
    `
})
// 湯類飲料

let drinks = [{
    img: './img/湯類飲料/冬菜蝦仁蛋湯.png',
    content: '冬菜蝦仁蛋湯',
    Description: '冬菜蝦仁蛋湯'

},
{
    img: './img/湯類飲料/阿里山冷泡茶.png',
    content: '阿里山冷泡茶',
    Description: '阿里山冷泡茶'

},
{
    img: './img/湯類飲料/魚肚湯.png',
    content: '魚肚湯',
    Description: '魚肚湯'

},
{
    img: './img/湯類飲料/酸梅醋.png',
    content: '酸梅醋',
    Description: '酸梅醋'

},
{
    img: './img/湯類飲料/鹹菜桂竹筍.png',
    content: '鹹菜桂竹筍',
    Description: '鹹菜桂竹筍'

},
]
let drink = document.querySelector('.allfood-drink')
drinks.forEach(function (data) {
    drink.innerHTML += `
    <div class="col-sm-4 mb-4">
        <div class="card">
    <img src="${data.img}" class="card-img-top" alt="${data.Description}">
    <div class="card-body">
    <p class="card-text">${data.content}</p>
    </div>
    </div>
    </div>
    `
})

$('.allfood-title').click(function () {
    $('*').removeClass('active');
    $(this).addClass('active');
    let num = $(this).index();
    $($('.allfood-content')[num]).addClass('active');

})

// 宅配商品
// 沙鍋魚頭+魚肉組合
let headmeats = [{
    img: './img/宅配商品/沙鍋魚頭+魚肉組合.png',
    title: '特大',
    Description: '沙鍋菜2包+特大鰱魚頭半面+鰱魚肉2塊',
    price: '$860',
},
{
    img: './img/宅配商品/沙鍋魚頭+魚肉組合.png',
    title: '大',
    Description: '沙鍋菜1包+大鰱魚頭半面+鰱魚肉1塊',
    price: '$600',

},
{
    img: './img/宅配商品/沙鍋魚頭+魚肉組合.png',
    title: '中',
    Description: '沙鍋菜1包+中鰱魚半面+鰱魚肉1塊',
    price: '$570',

},
]
let headmeat = document.querySelector('.deliver-head-meat')
headmeats.forEach(function (data) {
    headmeat.innerHTML += `
    <div class="col-4">
        <div class="card">
            <img src="${data.img}" class="card-img-top" alt="${data.Description}">
            <div class="card-body">
                <h5 class="card-title">${data.title}</h5>
                <p class="card-text">
                    ${data.Description}
                    
                <div class="card-text1">
                    ${data.price}
                </div>
                </p>
                <a href="#" class="btn btn-primary">立即購買</a>
            </div>
        </div>
        </div>
    `
})

// 沙鍋魚頭組合
let heads = [{
    img: './img/宅配商品/沙鍋魚頭組合.png',
    title: '大',
    Description: '沙鍋菜1包+大鰱魚頭半面',
    price: '$530',
},
{
    img: './img/宅配商品/沙鍋魚頭組合.png',
    title: '中',
    Description: '沙鍋菜1包+中鰱魚頭半面',
    price: '$500',

},
{
    img: './img/宅配商品/沙鍋魚頭組合.png',
    title: '小',
    Description: '沙鍋菜1包+小鰱魚頭半面',
    price: '$470',

},
]
let head = document.querySelector('.deliver-head')
heads.forEach(function (data) {
    head.innerHTML += `
    <div class="col-4">
        <div class="card">
            <img src="${data.img}" class="card-img-top" alt="${data.Description}">
            <div class="card-body">
                <h5 class="card-title">${data.title}</h5>
                <p class="card-text">
                    ${data.Description}
                    
                <div class="card-text1">
                    ${data.price}
                </div>
                </p>
                <a href="#" class="btn btn-primary">立即購買</a>
            </div>
        </div>
        </div>
    `
})

// 沙鍋菜冷凍包
let freezing = [{
    img: './img/宅配商品/沙鍋菜冷凍包.png',
    title: '單點品項',
    Description: '每包2100公克±10公克，約三人份',
    price: '$250',
},
]

let freez = document.querySelector('.deliver-freezing')
freezing.forEach(function (data) {
    freez.innerHTML += `
    <div class="col-4">
        <div class="card">
            <img src="${data.img}" class="card-img-top" alt="${data.Description}">
            <div class="card-body">
                <h5 class="card-title">${data.title}</h5>
                <p class="card-text">
                    ${data.Description}
                    
                <div class="card-text1">
                    ${data.price}
                </div>
                </p>
                <a href="#" class="btn btn-primary">立即購買</a>
            </div>
        </div>
        </div>
    `
})


let meats = [{
    img: './img/宅配商品/沙鍋魚肉組合.png',
    title: '大',
    Description: '沙鍋菜1包+鰱魚肉2塊',
    price: '$390',
},
{
    img: './img/宅配商品/沙鍋魚肉組合.png',
    title: '中',
    Description: '沙鍋菜1包+鰱魚肉1塊',
    price: '$320',
},
]

let meat = document.querySelector('.deliver-meat')
meats.forEach(function (data) {
    meat.innerHTML += `
    <div class="col-4">
        <div class="card">
            <img src="${data.img}" class="card-img-top" alt="${data.Description}">
            <div class="card-body">
                <h5 class="card-title">${data.title}</h5>
                <p class="card-text">
                    ${data.Description}
                    
                <div class="card-text1">
                    ${data.price}
                </div>
                </p>
                <a href="#" class="btn btn-primary">立即購買</a>
            </div>
        </div>
        </div>
    `
})


$('.deliver-item-title').click(function () {
    $('*').removeClass('active2');
    $(this).addClass('active2');
    let num = $(this).index();
    $($('.deliver-item-content')[num]).addClass('active2');

})


var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});