<template>
  <not-sub-router :name="module">
    <search :module="module"
            :get-data="getData"
            @before-change="beforeChange"
            @after-change="afterChange" />
    <s-table ref="table"
             :get-data="getData" />
  </not-sub-router>
</template>
<script>
const __module = 'words'
import Search from '@/common/components/Search'
import sTable from './components/WordTable'
import { mapActions, mapMutations } from 'vuex'
import syncChange from '@/common/mixins/syncChange'
export default {
    components: {
        sTable,
        Search
    },
    mixins: [syncChange],
    data: () => ({
        module: __module
    }),
    async created() {
        const parent = this.$route.meta.parent
        this.setData({
            parent,
            [parent]: {
                id: this.$route.params.id
            }
        })
    },
    methods: {
        ...mapActions(__module, ['getData']),
        ...mapMutations(__module, {
            setData: 'update'
        })
    }
}
</script>
