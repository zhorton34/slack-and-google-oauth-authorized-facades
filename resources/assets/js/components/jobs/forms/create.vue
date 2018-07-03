<template>
    <div class="row">
        <div class="col-md-6">

            <div class="field">
                <label>Job Title</label>
                <input class="form-control" v-model="form.title" />
            </div>

            <div class="field">
                <hr>
                <label>Where was this job found?</label>
                <input class="form-control" v-model="form.source" />
            </div>

            <div class="field">
                <hr>
                <label>Add the link to where you found the job.</label>
                <input class="form-control" v-model="form.link" />
            </div>

            <div class="field">
                <hr>
                <label>When did you discover this job?</label>
                <input class='form-control' type="date" v-model="form.date_discovered" />
            </div>

            <div class="field">
                <hr>
                <label>Add a link to where the written up job proposal.</label>
                <input class="form-control" v-model="form.proposal_link" />
            </div>

            <div class="field">
                <hr>
                <div class="job-length">
                    <label>What is the estimated job time range?</label>
                    <br>
                    <input class='length form-control' type="number" v-model="form.start_length" />
                    <div class="length text-center">to</div>
                    <input class='length form-control' type="number" v-model="form.end_length" />

                    <select class='btn btn-default pull-right' v-model="form.length_period">
                        <option value="days">Days</option>
                        <option value="months">Months</option>
                        <option value="years">Years</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="field">
                <label>What is the payment type of the job?</label>
                <select class='btn btn-default pull-right' v-model="form.payment_type">
                    <option value="hourly">Hourly</option>
                    <option value="fixed">Fixed</option>
                    <option value="unknown">Unknown</option>
                </select>
            </div>

            <div class="field">
                <hr>
                <label>What is the payment amount?</label>
                <input class='form-control amount' type='number' v-model="form.payment_amount" />
            </div>

            <div class="field">
                <hr>
                <label>What is the job status?</label>
                <select class='btn btn-default pull-right' v-model="form.status">
                    <option value="prospect">Job Prospect</option>
                    <option value="interviewing">Interviewing</option>
                    <option value="active">Active</option>
                    <option value="paused">Paused</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <div class="field">
                <hr>
                <label>When is the jobs required completion date?</label>
                <input class="form-control" type='date' v-model="form.due_date" />
            </div>

            <div class="field">
                <hr>
                <label>Based on a scale of 1-10, how would you rate this project?</label>
                <input class="form-control" type="number" v-model="form.rating" />
            </div>

            <div class="field">
                <hr>
                <label>Any Important Notes About The Job?</label>
                <textarea class="form-control" v-model="form.notes" rows="3">
                </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center submit">
                <button class='btn btn-primary' @click="makeJob" :disabled="form.busy">
                    Add Job
                </button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</template>

<script>
    import forms from '@Broadcast/forms'

    export default {
        mixins: [forms],

        mounted()
        {
            this.setForm()
        },
        data()
        {
            return {form: {}}
        },

        methods:
            {
                makeJob()
                {
                    Spark.post('/jobs', this.form)
                        .then(response => {
                            console.log(response)
                        })
                },
                setForm()
                {
                    this.form = new SparkForm(this.jobForm)
                    return this
                },
                setDate()
                {
                    if(!this.form.date_discovered)
                        this.form.date_discovered = this.today()

                    return this
                },
            }
    }
</script>

<style>
    input[type=number] {float:right; width: 50px}
    .amount { width: 150px !important; }
    .job-length { min-height: 100px }
    .length { width: 50px; float:left !important }
    .form-control {max-width: 300px;}
    .submit { margin-top: 50px; }
    .field { height: 100px;}
</style>
