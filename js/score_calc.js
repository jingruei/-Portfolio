let errTimer = '';

function calc(e) {
    if (e && e.code != 'Enter') {
        return false;
    }
    let score = document.querySelector('#score');
    if (!score || !score.value) {
        let err = document.querySelector('#err-msg');
        score.focus();
        err.classList.add('active');
        clearTimeout(errTimer);
        errTimer = setTimeout(function() {
            err.classList.remove('active');
        }, 2000);
        return false;
    }

    let level = '#score';

    if (score.value >= 90) {
        level = '甲';
    }

    if (score.value >= 80 && score.value < 90) {
        level = '乙';
    }

    if (score.value >= 70 && score.value < 80) {
        level = '丙';
    }

    if (score.value >= 60 && score.value < 70) {
        level = '丁';
    }

    if(score.value <60) {
        level = '不及格';
    }

    let result = document.querySelector('#result');
    result.classList.add('active');
    result.innerHTML = '您的分數: ' + score.value + ' , 評定等級: ' + level;
}
console.log('Ready.');