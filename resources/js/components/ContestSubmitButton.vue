<template>
  <div class="contest-submit">
    <div v-if="hasErrors" class="errors">{{errorMessage}}</div>
    <div v-if="successMessage" class="errors">{{successMessage}}</div>
    <div class="mb-3">
      <custom-button @click="enter" :loading="submitting" class="btn-lg w-full block btn-green">{{submitButtonText}}</custom-button>
    </div>
    <div>
      <button @click="cancel" class="btn btn-lg w-full block btn-gray">Cancel</button>
    </div>
    
  </div>
</template>

<script>
export default {
  data() {
    return {
      errorMessage: null,
      hasErrors: false,
      submitting: false,
      successMessage: null
    }
  },
  methods: {
    enter() {
      this.submitting = true
      const validate = this.$tpd.validation.contest(this.validate)
      if(validate.status == 'error') {
        this.hasErrors = true
        this.errorMessage = 'There was an error!'
      } else {
        this.$store.dispatch('selections/enterContest', {id: this.currentContest.id, riders: this.$tpd.misc.selectedRiderIds()})
        .then(res => {
          this.$store.commit('user/setUserContests', res.data)
          this.successMessage = 'You have been entered into this contest!'
          this.submitting = false
          console.log(res)
        })
        .catch(err => console.log(err))
        .finally(() => {
          this.submitting = false
        })
      }
    },
    cancel() {
      console.log(this.userInContest)
      if(this.userInContest) {
        this.$router.go(-1)
      } else {
        this.$store.dispatch('selections/clearData').then(() => {
          this.$router.go(-1)
        })
      }
      
    }
  },
  computed: {
    validate() {
      return {
        minRiders: this.$tpd.validation.minRiders(),
        salary: this.$tpd.misc.remainingSalary() > 0
      }
    },
    riderIds() {
      return this.$store.getters['selections/selectedIds']
    },
    currentContest() {
      return this.$store.getters['base/currentContest']
    },
    userInContest() {
      const contests = this.$store.getters['user/contests']
      const ids = contests.map(c => c.contest_id)
      return ids.includes(this.currentContest.id)
    },
    submitButtonText() {
      if(_.isObject(this.currentContest))
      return this.userInContest ? 'Update' : 'Submit'
    }
  }
}
</script>

<style>
  .contest-submit {
    background: #fff;
    padding: 2rem 1.5rem;
    padding-bottom: 2rem;
  }
</style>