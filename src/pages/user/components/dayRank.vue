<template>
  <el-table
    :data="data"
    height="100%"
  >
    <el-table-column
      v-for="(item,index) in tableColumns"
      :prop="item.prop"
      :label="item.label"
      :key="index"
      align="center"
    />
  </el-table>
</template>

  <script>
export default {
  data: () => ({
    tableColumns: [
      {
        label: "名次",
        prop: "position"
      },
      {
        label: "名字",
        prop: "name"
      },
      {
        label: "时间",
        prop: "time"
      }
    ],
    data: [
      {
        position: "01",
        name: "王小虎",
        time: "22"
      }
    ]
  })
};
</script>