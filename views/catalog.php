<div id = "main">
    <div class="post_title"><h2>Каталог товаров</h2></div>
        <div class="gallery" id="gallery">
        <?= $catalog ?>
       </div>
    <div class = "menu">
        <br><button id="showMore" class="showMore">Показать еще</button><br>
    </div> 
</div>

<script>
    let showFrom = 5;
    let showCount = 5;
    let button = document.querySelectorAll('.showMore');
    button.forEach((elem) => {
        elem.addEventListener('click', ()=> {
            (async () => {
                const response = await fetch ('/api/showmore/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        showFrom: showFrom,
                        showCount: showCount,
                    }),
                });
                const answer = await response.text();
                document.getElementById('gallery').innerHTML += answer;
                showFrom += showCount;
                buy();
            })();
        })
    })

    function buy() {
        let buttons = document.querySelectorAll('.buy');
        buttons.forEach((elem) => {
            elem.addEventListener('click', ()=> {
                let id = elem.getAttribute('data-id');
                (async () => {
                    const response = await fetch ('/api/addbasket/', {
                        method: 'POST',
                        headers: new Headers({
                            'Content-Type': 'application/json'
                        }),
                        body: JSON.stringify({
                            id: id
                        }),
                    });
                    const answer = await response.json();
                    document.getElementById('count').innerText = answer.count;
                })();
            })
        })
    }
    buy();
</script>

