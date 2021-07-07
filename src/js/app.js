/* ==========================================================================
  App.js
  ========================================================================== */
import Vue from 'vue'
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);
var app = new Vue({
  props: ['content'],
  el: '#js-app',
  data() {
    return {
      window: {
        width: 0,
        height: 0
      },
      menuOpen: false,
      slideSelected: 0,
      currentSlide: 1,
      newsSliderTl: new gsap.timeline(),
      slideCount: 1,
      preventPress: false,
      sliding: null,
      menuTl: new gsap.timeline(),
      videoPlaying: [], // in case I need to use this again
      autoPlaySlides: true,
      selectedImg: 1,
    }
  },
  computed: {
    slidecount() {
      if (this.window.width < 576) {
        return 2
      }
      else if (this.window.width > 974 && this.window.width > 576) {
        return 5
      }
      else {
        return 5
      }
    },
  },
  methods: {
    playVideo(vRef, overlay) {
      this.videoPlaying = [vRef, overlay]
    },
    stopVideo() {
      gsap.to(this.$refs[this.videoPlaying[1]], { opacity: 1, duration: 0.5 })
      this.videoPlaying = []
    },
    slidePlay() {
      this.sliding = setInterval(() => {
        this.slideNext()
      }, 3000)
    },
    // GALLERY SLIDER
    selectImage(i){
      console.log(i)
      this.selectedImg = i
    },
    // NEWS SLIDER 
    slideChange(i) {
      clearInterval(this.sliding)
      if (!this.preventPress) {
        this.preventSlideClick(true)
        if (i > this.currentSlide) {
          this.newsSliderTl.to('.slideContent', { x: -100, opacity: 0, duration: 0.5 })
          setTimeout(() => {
            this.newsSliderTl.set('.slideContent', { x: 100, opacity: 0, onCompleteParams: this.currentSlide = i })
            this.newsSliderTl.to('.slideContent', { x: 0, opacity: 1, duration: 0.5, onComplete: this.preventSlideClick(false) })
          }, 500)
        } else {
          this.newsSliderTl.to('.slideContent', { duration: 0.5, opacity: 0, x: 100 })
          setTimeout(() => {
            this.newsSliderTl.set('.slideContent', { opacity: 0, x: -100, onCompleteParams: this.currentSlide = i })
            this.newsSliderTl.to('.slideContent', { duration: 0.5, x: 0, opacity: 1, onComplete: this.preventSlideClick(false) })
          }, 500)
        }
      }
    },
    slideNext(stopAuto) {
      if (stopAuto) {
        clearInterval(this.sliding)
      }

      if (!this.preventPress) {
        this.preventSlideClick(true)
        if (this.currentSlide < this.slideCount) {
          this.newsSliderTl.to('.slideContent', { x: -100, opacity: 0, duration: 0.5 })
          setTimeout(() => {
            this.newsSliderTl.set('.slideContent', { x: 100, opacity: 0, onComplete: this.next() })
            this.newsSliderTl.to('.slideContent', { x: 0, opacity: 1, duration: 0.5, onComplete: this.preventSlideClick(false) })
          }, 500);
        } else {
          this.newsSliderTl.to('.slideContent', { x: -100, opacity: 0, duration: 0.5 })
          setTimeout(() => {
            this.newsSliderTl.set('.slideContent', { x: 100, opacity: 0, onComplete: this.reset() })
            this.newsSliderTl.to('.slideContent', { x: 0, opacity: 1, duration: 0.5, onComplete: this.preventSlideClick(false) })
          }, 500);
        }
      }
    },
    slidePrev() {
      clearInterval(this.sliding)
      if (!this.preventPress) {
        this.preventSlideClick(true)
        if (this.currentSlide >= this.slideCount) {

          this.newsSliderTl.to('.slideContent', { x: 100, opacity: 0, duration: 0.5 })
          setTimeout(() => {
            this.newsSliderTl.set('.slideContent', { x: -100, opacity: 0, onComplete: this.prev() })
            this.newsSliderTl.to('.slideContent', { x: 0, opacity: 1, duration: 0.5, onComplete: this.preventSlideClick(false) })
          }, 500);
        } else {
          this.newsSliderTl.to('.slideContent', { x: 100, opacity: 0, duration: 0.5 })
          setTimeout(() => {
            this.newsSliderTl.set('.slideContent', { x: -100, opacity: 0, onComplete: this.resetBack() })
            this.newsSliderTl.to('.slideContent', { x: 0, opacity: 1, duration: 0.5, onComplete: this.preventSlideClick(false) })
          }, 500);
        }
      }
    },
    // had to make these functions
    next() {
      this.currentSlide++
    },
    prev() {
      this.currentSlide--
    },
    reset(end) {
      this.currentSlide = 1
    },
    resetBack() {
      if (this.currentSlide === this.slideCount) {
        this.currentSlide = this.slideCount
      }
      if (this.currentSlide === 1) {
        this.currentSlide = this.slideCount
      }
      else {
        this.currentSlide--
      }
    },
    preventSlideClick(val) {
      this.preventPress = val
    },
    dropDown(selecton, onOff) {
      var item = this.$refs[selecton]
      if (onOff) {
        item.style.display = 'block'
        item.style.opacity = 1

      } else {
        item.style.display = 'none'
        item.style.opacity = 0
      }
    },
    handleResize() {
      this.window.width = window.innerWidth;
      this.window.height = window.innerHeight;
    }
  },
  watch: {
    autoPlaySlides(v){
      if(!v){
        clearInterval(this.sliding)
      }
    },
    videoPlaying(val) {
      this.$refs[val[0]].play()
      gsap.to(this.$refs[val[1]], { opacity: 0, duration: 0.5 })
    },
    menuOpen(val) {
      var mobileTl = new gsap.timeline();
      if (val) {
        mobileTl.from('.mobileMenu li', { autoAlpha: 0, x: -10, duration: 0.3, stagger: 0.1, ease: 'easeIn' });
        mobileTl.from('.mobileMenu span', { autoAlpha: 0, x: -10, duration: 0.3, stagger: 0.1, ease: 'easeIn' }, '=-0.5');
      } else {
        mobileTl.kill()
      }
    }
  },
  created() {
    window.addEventListener('resize', this.handleResize);
    this.handleResize();
 
      this.slidePlay()
    
  },
  destroyed() {
    window.removeEventListener('resize', this.handle)
  }
})
