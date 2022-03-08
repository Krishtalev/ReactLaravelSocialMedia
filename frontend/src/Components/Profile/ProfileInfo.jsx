import p from "./Profile.module.css"

const ProfileInfo = () => {
	return (
		<div className={p.profile_info_wrapper}>
			<div className={p.profile_img_wrapper}>
				<img className={p.profile_img} 
					src="https://images2.minutemediacdn.com/image/upload/c_crop,h_1193,w_2121,x_0,y_64/f_auto,q_auto,w_1100/v1565279671/shape/mentalfloss/578211-gettyimages-542930526.jpg" alt="ava">
				</img>
			</div>
			<div className={p.profile_info}>
				<div className={p.profile_name}>Ignat M.</div> <div className={p.hr}></div>
				<div className={p.profile_additional}>
					<div className={p.profile_additional_key}>
						<div className={p.key_item}>Date of Birth:</div>
						<div className={p.key_item}>City:</div>
						<div className={p.key_item}>Education:</div>
						<div className={p.key_item}>Web-Site:</div>
					</div>
					<div className={p.profile_additional_value}>
						<div className={p.value_item}>01.01.2000</div>
						<div className={p.value_item}>Tomsk</div>
						<div className={p.value_item}>TSU</div>
						<div className={p.value_item}>https://lala.com</div>
					</div>
				</div>
			</div>
		</div>
	)
}

export default ProfileInfo;