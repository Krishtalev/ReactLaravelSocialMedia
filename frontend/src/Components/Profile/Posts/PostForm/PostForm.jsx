import style from "./PostForm.module.css"

const PostForm = () => {
    const sendData = () => {

    }

    return (
        <div className={style.newPost}>
            <form className={style.postForm} onSubmit={sendData}>
                <input className={style.postText} placeholder="What's new" type="text"/>
                <input className={style.submitButton} type="submit" value="AddPost"/>
            </form>
        </div>
    )
}

export default PostForm