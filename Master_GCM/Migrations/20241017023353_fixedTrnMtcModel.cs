using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class fixedTrnMtcModel : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_MAINTENANCE_ASSETCODE",
                table: "TRN_HIST_MAINTENANCE",
                column: "ASSETCODE",
                unique: true);
        }
    }
}
