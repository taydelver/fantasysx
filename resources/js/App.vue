<template>
  <div class="layout">
    <div class="layout__header">
      <main-header></main-header>
      <contests-page-header v-if="pageName == 'selections' && !currentContestLoading"></contests-page-header>
    </div>
    <router-view></router-view>
    <div class="layout__bottom">
      <bottom-nav v-if="showBottomNav"></bottom-nav>
      <contest-submit-button v-if="showContestButton"></contest-submit-button>
    </div>
    
    
  </div>
  
</template>

<script>
import BottomNav from './partials/BottomNav'
import MainHeader from './partials/MainHeader'
import PageHeader from './partials/PageHeader'
import ContestsPageHeader from './partials/ContestsPageHeader'
import ContestSubmitButton from './components/ContestSubmitButton'
export default {
  props: {
    userData: String
  },
  components: {BottomNav, MainHeader, PageHeader, ContestsPageHeader, ContestSubmitButton},
  data() {
    return {
      headerComponent: 'main-header',
    }

  },
  mounted() {
    this.setUserData()
    this.init().then().catch(err => console.log(err))
  },
  watch: {
    '$route'() {
      console.log(this.$route)
    }
  },
  methods: {
    async init() {
      const events = await this.$store.dispatch('base/getEvents')
      const userContests = await this.$store.dispatch('user/getUserContests')
      return Promise.all([events, userContests])
    },
    setUserData() {
      const data = JSON.parse(this.userData)
      this.$store.commit('user/setUserData', data)
    },

  },
  computed: {
    currentContest() {
      return this.$store.getters['base/currentContest']
    },
    currentContestLoading() {
      const contest = this.currentContest
      return _.isNull(contest);
    },
    pageName() {
      return this.$route.name
    },
    bottomComponent() {
      if(this.pageName == 'selections') {
        return 'selections-summary'
      } else {
        return 'bottom-nav'
      }
    },
    showContestButton() {
      return this.pageName == 'selections'
    },
    showBottomNav() {
      if(this.pageName == 'selections') {
        return false
      } else {
        return true
      }
    }
  }
}
</script>

<style>

</style>