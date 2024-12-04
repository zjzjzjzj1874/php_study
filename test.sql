// 找到符合条件的记录，并修改对应的内容
db.table.find({
    _id: ObjectId("674e142fba35ea0a14346969"),
    firstEvilName: ''
}).sort({ createTime: -1 }).limit(1).forEach(function(doc) {
    // 遍历 contents 数组
    doc.contents.forEach(function(content) {
        if (content.class === '音频') {
            // 从 body 中提取新的 contentId
            let urlParts = content.body.split('/');
            let newContentId = urlParts[urlParts.length - 1].split('.mp3')[0]; // 提取最后一部分并去掉 .mp3
            
            // 更新 contentId
            content.contentId = newContentId; 
        }
        if (content.class === '视频') {
            // 从 body 中提取新的 contentId
            let urlParts = content.body.split('/');
            let newContentId = urlParts[urlParts.length - 1].split('.mp4')[0]; // 提取最后一部分并去掉 .mp3
            
            // 更新 contentId
            content.contentId = newContentId; 
        }
    });

    // 更新文档
    db.table.updateOne(
        { _id: doc._id },
        { $set: { contents: doc.contents } }
    );
});

db.table.find({_id: ObjectId("674e142fba35ea0a14346969")});