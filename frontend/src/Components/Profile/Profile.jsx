import PostsContainer from "./Posts/PostsContainer";
import p from "./Profile.module.css"
import ProfileInfo from "./ProfileInfo";

const Profile = (props) => {
    return (
        <div>
            <section className={p.content}>
                <img className={p.back_img}
                     src="https://png.pngtree.com/thumb_back/fh260/background/20200714/pngtree-modern-double-color-futuristic-neon-background-image_351866.jpg"
                     alt="back-img">
                </img>
                <div className={p.profile_wrapper}>
                    <div className={p.profile}>
                        <ProfileInfo/>
						<PostsContainer store={props.store} />
                    </div>
                </div>
            </section>
        </div>
    )
}

export default Profile;