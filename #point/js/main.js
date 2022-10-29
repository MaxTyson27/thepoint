'use strict';

// prompt('пароль')

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

    return animatePromise('.line', 'anim', 1000, false).then(res => {

      return animatePromise('.title', 'anim', 500, false).then(res => {
        
      })

    })

  })

}

animationContent()