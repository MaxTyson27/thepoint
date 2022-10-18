$(function () {
  $('.content__slider').slick({
    dots: true,
    fade: true,
  })
  $('.gallery__slider').slick({
    dots: true,
    fade: true,
  })
  $('.name').keypress(function (e) {
    if (e.keyCode == 32) return false;
    if (this.value.length == 1) {
      this.value = this.value.toUpperCase();
    }
  });
  $('.phone').inputmask({ "mask": "+7(999) 999-99-99" });
  $("form").submit(function (event) {
  event.preventDefault();
  var str = $(this).serialize();
  if (true) {
    $.ajax({
      type: "POST",
      url: "send.php",
      data: str,
      success: function () {
        console.log("send");
        $('.thank').addClass('active')
        $("form")[0].reset();
      },
      error: function () {
        console.log("fail");
      },
    });
  }
  return false;
});
});



const validateInputs = () => {
  const inputName = document.querySelector('.name')
  inputName.addEventListener('input', e => {
    e.target.value = e.target.value.replace(/[0-9]/g, '');
  })
  
}

const animationContent = () => {
  const animatePromise = (element, className, t, deleteClass) => {
    return new Promise((resolve) => {
      setTimeout(() => {
        const findedElem = document.querySelector(element)
          if(!deleteClass){
            findedElem.classList.add(className)
          } else {
            findedElem.classList.remove(className)
          } 
          resolve('123')
      }, t);
    })
  }

  animatePromise('.logo', 'anim', 1000, false).then((res) => {

    return animatePromise('.line', 'anim', 500, false).then(res => {

      return animatePromise('.line', 'hidden', 1000, false).then(res => {

        return animatePromise('.logo', 'anim2', 1000, false).then(res => {

          return animatePromise('.content__title', 'anim', 1000, false).then(res => {
            return animatePromise('.logo', 'anim', 0, true).then(res => {
              return animatePromise('.wrapper', 'load', 500, true)
            })
          })
        })
      })
    })
  })

}

const tabsLogic = () => {
  const buttons = [...document.querySelectorAll('.button')]
  const tabs = [...document.querySelectorAll('.tab')]
  const logo = document.querySelector('.logo')

  buttons.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault()
      const id = e.target.getAttribute('href')
      const elem = document.querySelector(id)
      tabs.forEach(tab => {
        tab.classList.add('hidden')
      });
      elem.classList.remove('hidden')
      if(id === '#gallery'){
        logo.classList.add('small')
      } else {
        logo.classList.remove('small')
      }
      if(id === '#contact'){
        document.querySelector('.logo').style.display = 'none'
        if(document.documentElement.offsetHeight <= 1024){
          document.querySelector('.wrapper').style.height = '100%'
        }
      }
    })
  });


}

const changeLang = () => {
  const buttons = [...document.querySelectorAll('.lang')]


  const hiddenBlocks = (language) => {
    const elemsRu = [...document.querySelectorAll('.ru')]
    const elemsEn = [...document.querySelectorAll('.en')]
    if(language === 'ru'){
      elemsRu.forEach(elem => {
        elem.style.display = 'block'
      });
      elemsEn.forEach(elem => {
        elem.style.display = 'none'
      });
    } else {
      elemsRu.forEach(elem => {
        elem.style.display = 'none'
      });
      elemsEn.forEach(elem => {
        elem.style.display = 'block'
      });
    }
  }

  buttons.forEach(button => {

    button.addEventListener('click', e => {

      e.preventDefault()
      const lang = e.target.getAttribute('data-lang')
      const buttonsRu = [...document.querySelectorAll('[data-lang="ru"]')]
      const buttonsEn = [...document.querySelectorAll('[data-lang="en"]')]

      if(lang === 'ru'){
        buttonsEn.forEach(btn => {
          btn.classList.remove('active')
        });
        buttonsRu.forEach(btn => {
          btn.classList.add('active')
        });
      } else {
        buttonsEn.forEach(btn => {
          btn.classList.add('active')
        });
        buttonsRu.forEach(btn => {
          btn.classList.remove('active')
        });
      }

      e.target.classList.add('active')


      hiddenBlocks(lang)

    })
  });
}

changeLang()
validateInputs()

tabsLogic()

animationContent()