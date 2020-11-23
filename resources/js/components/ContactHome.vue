<template>
	<div class="container position-relative" id="contact-home">
		<div
			class="spinner-border text-primary position-fixed top left"
			role="status"
			v-if="loading"
		>
			<span class="sr-only">Loading...</span>
		</div>

		<!-- Box contacts list -->
		<div class="bg-white shadow-sm py-3 px-5 mb-5 box-contactList">
			<div class="d-flex align-items-stretch flex-column overflow-scroll">
				<div>
					<h5>Nombre des contacts</h5>
					<h2 class="display-2">{{ list.length }}</h2>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nom</th>
							<th scope="col">Prenom</th>
							<th scope="col">Postnom</th>
							<th scope="col">Email</th>
							<th scope="col">Numero</th>
							<th scope="col">Societe</th>
							<th scope="col">Date de naissance</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, index) in list" :key="index">
							<th scope="row">{{ index + 1 }}</th>
							<td>{{ item.nom }}</td>
							<td>{{ item.prenom }}</td>
							<td>{{ item.postnom }}</td>
							<td>{{ item.email }}</td>
							<td>{{ item.numero }}</td>
							<td>{{ item.societe }}</td>
							<td>{{ item.date_naissance }}</td>
							<td>
								<button
									type="button"
									class="btn btn-primary"
									data-toggle="modal"
									data-target="#exampleModal"
									@click="setUpdatedform(item)"
								>
									Afficher
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END Box contacts list -->

		<!-- Modal MAJ contact -->
		<div
			class="modal fade"
			id="exampleModal"
			tabindex="-1"
			role="dialog"
			aria-labelledby="exampleModalLabel"
			aria-hidden="true"
		>
			<div class="modal-dialog" role="document">
				<form
					@submit.prevent="update_contact"
					class="modal-content"
					v-if="!isEmpty(updateForm)"
				>
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							{{ updateForm.prenom }} {{ updateForm.nom }}
						</h5>
						<button
							type="button"
							class="close"
							data-dismiss="modal"
							aria-label="Close"
						>
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="validationDefault01">Nom</label>
									<input
										type="text"
										class="form-control"
										id="validationDefault01"
										placeholder="Nom"
										v-model="updateForm.nom"
										required
									/>
								</div>
								<div class="col-12 mb-3">
									<label for="validationDefault02">Prenom</label>
									<input
										type="text"
										class="form-control"
										id="validationDefault02"
										placeholder="Prenom"
										v-model="updateForm.prenom"
										required
									/>
								</div>
								<div class="col-12 mb-3">
									<label for="validationDefaultUsername">Postnom</label>
									<input
										type="text"
										class="form-control"
										id="validationDefaultUsername"
										placeholder="Postnom"
										aria-describedby="inputGroupPrepend2"
										v-model="updateForm.postnom"
										required
									/>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 mb-3">
									<label for="validationDefault03">Email</label>
									<input
										type="email"
										class="form-control"
										id="validationDefault03"
										placeholder="Email"
										v-model="updateForm.email"
										required
									/>
								</div>
								<div class="col-12 mb-3">
									<label for="validationDefault04">Numero</label>
									<input
										type="tel"
										class="form-control"
										id="validationDefault04"
										placeholder="numero"
										v-model="updateForm.numero"
										required
									/>
								</div>
								<div class="col-12 mb-3">
									<label for="validationDefault05">Societe</label>
									<input
										type="text"
										class="form-control"
										id="validationDefault05"
										placeholder="Societe"
										v-model="updateForm.societe"
										required
									/>
								</div>

								<div class="col-12 mb-3">
									<label for="validationDefault06">Date de naissance</label>
									<input
										type="date"
										class="form-control"
										id="validationDefault06"
										placeholder="Date de naissance"
										v-model="updateForm.date_naissance"
										required
									/>
								</div>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-dafault" data-dismiss="modal">
							Fermer
						</button>
						<button type="submit" class="btn btn-primary">
							Mettre à jours
						</button>
						<button
							type="button"
							@click="delete_contact"
							class="btn btn-danger"
						>
							Supprimer
						</button>
					</div>
				</form>
			</div>
		</div>
		<!-- End Modal MAJ contact -->

		<!-- Form Add contact -->
		<div class="bg-white shadow-sm py-3 px-5">
			<legend>Ajouter un contact</legend>
			<form @submit.prevent="add_contact">
				<div class="form-row">
					<div class="col-md-4 mb-3">
						<label for="validationDefault01">Nom</label>
						<input
							type="text"
							class="form-control"
							id="validationDefault01"
							placeholder="Nom"
							v-model="form.nom"
							required
						/>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefault02">Prenom</label>
						<input
							type="text"
							class="form-control"
							id="validationDefault02"
							placeholder="Prenom"
							v-model="form.prenom"
							required
						/>
					</div>
					<div class="col-md-4 mb-3">
						<label for="validationDefaultUsername">Postnom</label>

						<input
							type="text"
							class="form-control"
							id="validationDefaultUsername"
							placeholder="Postnom"
							aria-describedby="inputGroupPrepend2"
							v-model="form.postnom"
							required
						/>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-3 mb-3">
						<label for="validationDefault03">Email</label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroupPrepend2">@</span>
							</div>
							<input
								type="email"
								class="form-control"
								id="validationDefault03"
								placeholder="Email"
								v-model="form.email"
								required
							/>
						</div>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault04">Numero</label>
						<input
							type="tel"
							class="form-control"
							id="validationDefault04"
							placeholder="numero"
							v-model="form.numero"
							required
						/>
						<small class="text-primary">Format congolais uniquement!</small>
					</div>
					<div class="col-md-3 mb-3">
						<label for="validationDefault05">Societe</label>
						<input
							type="text"
							class="form-control"
							id="validationDefault05"
							placeholder="Societe"
							v-model="form.societe"
							required
						/>
					</div>

					<div class="col-md-3 mb-3">
						<label for="validationDefault06">Date de naissance</label>
						<input
							type="date"
							class="form-control"
							id="validationDefault06"
							placeholder="Date de naissance"
							v-model="form.date_naissance"
							required
						/>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">
					Ajouter le contact
				</button>
				<div v-if="addError">
					{{ addError }}
				</div>
			</form>
		</div>
	</div>
</template>

<script>
import axios from "axios";

export default {
	name: "contact-home",
	data() {
		return {
			list: [],
			form: {
				nom: null,
				prenom: null,
				postnom: null,
				email: null,
				numero: null,
				societe: null,
				date_naissance: null,
			},
			addError: null,
			updateForm: {},
			loading: true,
		};
	},
	mounted() {
		console.log("Component mounted.");
		axios
			.get("http://127.0.0.1:8000/api/get_contacts")
			.then((res) => {
				console.log(res);
				this.list = res.data;
			})
			.catch((err) => {
				console.error(err);
			})
			.finally(() => {
				this.loading = false;
			});
	},
	methods: {
		isEmpty(obj) {
			for (var prop in obj) {
				if (obj.hasOwnProperty(prop)) {
					return false;
				}
			}

			return JSON.stringify(obj) === JSON.stringify({});
		},
		add_contact() {
			this.loading = true;
			this.addError = null;
			// Validation here
			axios
				.post("http://127.0.0.1:8000/api/add_contact", this.form)
				.then((res) => {
					console.log(res);
					this.list = [...this.list, res.data];
				})
				.catch((err) => {
					console.error(err);
					this.addError = err;
				})
				.finally(() => {
					this.loading = false;
					for (let key in this.form) {
						if (this.form.hasOwnProperty(key)) {
							this.form[key] = null;
						}
					}
				});
		},
		setUpdatedform(data) {
			this.updateForm = data;
		},
		update_contact() {
			this.loading = true;

			// Validation here
			axios
				.put(
					"http://127.0.0.1:8000/api/update_contact/" + this.updateForm.id,
					this.updateForm
				)
				.then((res) => {
					console.log(res);
					this.list = this.list.filter((item) => {
						if (item.id == this.updateForm.id) {
							console.log;
							return JSON.parse(JSON.stringify(this.updateForm));
						} else {
							return item;
						}
					});
				})
				.catch((err) => {
					console.error(err);
				})
				.finally(() => {
					this.loading = false;

					for (let key in this.updateForm) {
						if (this.updateForm.hasOwnProperty(key) && this.updateForm[key]) {
							this.updateForm[key] = null;
						}
					}
				});
		},
		delete_contact() {
			this.loading = true;
			// Validation here
			axios
				.delete(
					"http://127.0.0.1:8000/api/delete_contact/" + this.updateForm.id
				)
				.then((res) => {
					console.log(this.updateForm.id);
					this.list = this.list.filter((item) => item.id != this.updateForm.id);
				})
				.catch((err) => {
					console.error(err);
				})
				.finally(() => {
					this.loading = false;

					for (let key in this.updateForm) {
						if (this.updateForm.hasOwnProperty(key)) {
							this.updateForm[key] = null;
						}
					}
				});
		},
	},
};
</script>

<style>
#contact-home .box-contactList {
	/*height: 80vh;*/
}
#contact-home .box-contactList .contact-list {
	height: auto;
}
</style>
