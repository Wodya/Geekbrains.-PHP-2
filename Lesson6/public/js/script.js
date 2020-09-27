function addGoodToBasket(goodId) {
    jQuery.ajax({
        url: '/basket/add',
        type: 'post',
        data: {id: goodId, quantity: 1},
        success: (response) => {
            if (!response.success) {
                console.log(response);
                return;
            }
            jQuery('.countGood').text(`(${response.count})`);
        }
    });
}