<template>
  <baseForm ref="baseForm"
            :need-btn="needBtn"
            :btn-text="btnText"
            :btn-disabled="btnDisabled"
            :form-item="formItem"
            :get-form-data="getFormData"
            @submit="submit">
    <slot />
  </baseForm>
</template>
<script>
import Add from '@/common/mixins/Add'
export default {
    name: 'Add',
    mixins: [Add]
}
</script>
